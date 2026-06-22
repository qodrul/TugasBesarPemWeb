<?php
require_once '../koneksi.php';

// Hanya Admin yang boleh akses API ini
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    echo json_encode(['status' => 'error', 'message' => 'Akses ditolak']);
    exit;
}

header('Content-Type: application/json');
$action = $_POST['action'] ?? ($_GET['action'] ?? '');

// 1. Ambil Data Semua Petugas (Cleaner)
if ($action == 'get_cleaners') {
    $query = "SELECT * FROM cleaners ORDER BY created_at DESC";
    $result = mysqli_query($koneksi, $query);
    
    $cleaners = [];
    while($row = mysqli_fetch_assoc($result)) {
        $cleaners[] = $row;
    }
    echo json_encode(['status' => 'success', 'data' => $cleaners]);
}

// 2. Tambah Petugas
elseif ($action == 'add_cleaner') {
    $name  = bersihkan_input($_POST['name'] ?? '');
    $phone = bersihkan_input($_POST['phone'] ?? '');

    if(empty($name) || empty($phone)){
        echo json_encode(['status' => 'error', 'message' => 'Nama dan No WA wajib diisi']);
        exit;
    }

    $query = "INSERT INTO cleaners (name, phone, status) VALUES ('$name', '$phone', 'Tersedia')";
    if(mysqli_query($koneksi, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Petugas berhasil ditambahkan']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menambah petugas']);
    }
}
?>
