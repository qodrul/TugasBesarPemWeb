<?php
session_start();
// Jika sudah login, lempar ke dashboard sesuai rolenya
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') header("Location: dashboardAdmin.php");
    else header("Location: dashboardCustomer.php");
    exit;
} 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk / Daftar | WeCleanIt</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,700&family=Syne:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        darkblue: '#0F5A96',
                        skyblue: '#74B4D9',
                        lightsky: '#E0F2FE',
                        neutralbg: '#F0F9FF',
                    },
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        heading: ['Syne', 'sans-serif'],
                    }
                }
            }
        }
    </script>