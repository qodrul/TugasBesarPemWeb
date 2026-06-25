# WeCleanIt

## Deskripsi
WeCleanIt merupakan platform aplikasi web penyedia layanan jasa kebersihan yang dirancang khusus untuk area Mataram dan sekitarnya. Target utamanya adalah mahasiswa, karyawan, dan rumah tangga yang menyewa kosan dan membutuhkan layanan kebersihan (sapu, pel, sikat kamar mandi, dll) secara praktis, transparan, dan terpercaya.

Sistem ini mengubah cara tradisional (pesan manual lewat chat yang rentan miskomunikasi) menjadi sistem pemesanan mandiri (sistem booking otomatis) yang rapi, baik untuk pelanggan maupun pengelola bisnis (Admin).
## Team Roles & Responsibilities
Ketua: Mika Khairan Djubikit (Front End)

Anggota 1: Wimar Aryasmarta Prakasa (Back End)

Anggota 2: Muhamad Syahril Qodrul Irpan (Back End)
## Alamat
[http://localhost]

## Menu Utama
```
- Customer (Pelanggan)
    - Landing Page
    - Authentication Page (Login, Register, OTP)
    - Dashboard (Pesanan Aktif & Jalan Pintas)
    - Booking Page (Wizard Pemesanan 4 Langkah)
    - Order History & Review Page
    - Profile & Multi-Address Management Page
- Admin (Pengelola)
    - Admin Login Page
    - Overview Dashboard (Statistik Keuangan & Operasional)
    - Order Management Page (Konfirmasi, Tugaskan Staf, Selesai, Batal)
    - Schedule/Slot Availability Page
    - Staff/Cleaner Management Page
    - Customer Data Page
    - Package & Price Management Page
    - Reports Page (Export CSV)
```
## SiteMap
```
WE CLEAN IT
│
├── Home
│   ├── Tentang Kami
│   ├── Layanan
│   ├── Paket Harga
│   ├── Testimoni
│   ├── Kontak
│   └── Login / Registrasi
│
├── Customer
│   ├── Dashboard
│   ├── Pesan Layanan
│   ├── Riwayat Pesanan
│   ├── Profil
│   └── Logout
│
├── Admin
│   ├── Dashboard
│   ├── Kelola Pesanan
│   ├── Kelola Customer
│   ├── Kelola Petugas
│   ├── Kelola Paket
│   ├── Laporan
│   └── Logout
│
└── Database
    ├── User
    ├── Customer
    ├── Petugas
    ├── Paket
    └── Pesanan
```
## Teknologi
HTML, PHP, CSS, Javascript, Tailwind, MySQL

## Requirement
To use Wecleanit you must've had all this installed and configured:
- PHP
- MySQL/MariaDB
## Screenshot Aplikasi
**Halaman Login**
<img width="1280" height="734" alt="WhatsApp Image 2026-06-25 at 16 13 14" src="https://github.com/user-attachments/assets/3336e7f7-5013-496e-abad-cebad3b3ab65" />
**Dasbord Admin**
<img width="1280" height="734" alt="WhatsApp Image 2026-06-25 at 16 13 17" src="https://github.com/user-attachments/assets/6ae5178f-d4a7-4e35-91b4-aa90d76be4be" />
**Dasbord Pelanggan**
<img width="1280" height="734" alt="WhatsApp Image 2026-06-25 at 16 13 19 (2)" src="https://github.com/user-attachments/assets/c670af7c-359a-44bf-9319-6ef3742b22c2" />

# Bug Log

## Bug 1 — Edit Profil (Upload Foto Profil) Tidak Berhasil

**Gejala:**
Customer berhasil memilih foto profil dan menekan tombol upload, namun foto profil tidak berubah atau tetap menggunakan gambar sebelumnya.

**Langkah Reproduksi:**

1. Login sebagai customer.
2. Buka halaman Profil.
3. Pilih foto profil baru.
4. Klik tombol Upload/Simpan.
5. Foto profil tidak berubah.

**Hipotesis Penyebab:**
Proses upload file gagal karena direktori penyimpanan belum dibuat, permission folder tidak sesuai, atau proses `move_uploaded_file()` gagal dijalankan.

**Fix (apa yang diubah):**
Menambahkan pengecekan keberhasilan upload file, memastikan folder upload tersedia, dan menampilkan pesan error ketika proses upload gagal.

**Bukti:**
`profile_api.php` melakukan validasi file tetapi belum terdapat pencatatan error apabila proses penyimpanan file gagal.

---

## Bug 2 — Status Cleaner Tidak Terupdate Otomatis

**Gejala:**
Cleaner yang sedang mengerjakan pesanan masih ditampilkan dengan status "Tersedia" pada dashboard admin.

**Langkah Reproduksi:**

1. Admin mengonfirmasi pesanan dan menugaskan cleaner.
2. Cleaner mulai mengerjakan pesanan.
3. Buka menu Kelola Petugas.
4. Status cleaner tetap "Tersedia".

**Hipotesis Penyebab:**
Tidak terdapat proses otomatis yang mengubah status cleaner ketika pesanan berpindah ke status "Sedang Dikerjakan" atau "Selesai".

**Fix (apa yang diubah):**
Menambahkan query update status cleaner pada proses konfirmasi dan penyelesaian pesanan sehingga status berubah secara otomatis.

**Bukti:**
Data cleaner tersimpan pada tabel `cleaners`, namun tidak ditemukan mekanisme sinkronisasi otomatis dengan status pesanan.

---

## Bug 3 — Tombol Tambah Paket Tidak Berfungsi

**Gejala:**
Admin menekan tombol "Tambah Paket", tetapi data paket baru tidak tersimpan ke database.

**Langkah Reproduksi:**

1. Login sebagai admin.
2. Buka menu Kelola Paket.
3. Isi data paket.
4. Klik tombol Tambah Paket.
5. Tidak ada perubahan pada daftar paket.

**Hipotesis Penyebab:**
Request dari frontend tidak mengirim parameter `action=add_package` atau event tombol tidak terhubung dengan API yang benar.

**Fix (apa yang diubah):**
Memastikan tombol memanggil endpoint `package_api.php` dengan action `add_package` dan seluruh field terkirim dengan benar.

**Bukti:**
Pada `package_api.php`, proses penambahan paket hanya dijalankan jika action bernilai `add_package`.

---

## Bug 4 — Konfirmasi Pembayaran Tidak Tersedia

**Gejala:**
Admin tidak dapat melakukan konfirmasi pembayaran pelanggan setelah pesanan dibuat.

**Langkah Reproduksi:**

1. Customer membuat pesanan.
2. Admin membuka dashboard pesanan.
3. Tidak ditemukan menu atau tombol konfirmasi pembayaran.

**Hipotesis Penyebab:**
Fitur konfirmasi pembayaran belum diimplementasikan pada backend maupun frontend.

**Fix (apa yang diubah):**
Menambahkan fitur konfirmasi pembayaran beserta perubahan status pembayaran pada tabel pesanan.

**Bukti:**
Data pesanan langsung disimpan dengan status pembayaran tertentu tanpa proses verifikasi oleh admin.

---

## Bug 5 — Statistik Pesanan Hari Ini dan Pendapatan Tidak Update

**Gejala:**
Jumlah pesanan hari ini dan total pendapatan pada dashboard admin tidak berubah meskipun terdapat pesanan baru.

**Langkah Reproduksi:**

1. Customer membuat pesanan baru.
2. Admin membuka dashboard.
3. Statistik tetap menampilkan data lama.

**Hipotesis Penyebab:**
Query dashboard tidak menghitung data terbaru atau data hanya diperbarui saat halaman pertama kali dimuat.

**Fix (apa yang diubah):**
Memperbaiki query perhitungan statistik dan menambahkan proses refresh data secara berkala.

**Bukti:**
`report_api.php` menggunakan query perhitungan pesanan dan pendapatan berdasarkan data transaksi yang tersimpan.

---

## Bug 6 — Laporan Keuangan Tidak Update

**Gejala:**
Laporan keuangan bulanan tidak berubah meskipun terdapat transaksi baru yang telah selesai.

**Langkah Reproduksi:**

1. Customer membuat pesanan.
2. Admin menyelesaikan pesanan.
3. Buka menu Laporan Keuangan.
4. Nilai pendapatan tidak bertambah.

**Hipotesis Penyebab:**
Perhitungan laporan hanya mengambil data dengan status tertentu atau query laporan tidak berjalan dengan benar.

**Fix (apa yang diubah):**
Memastikan transaksi berstatus "Selesai" masuk ke proses perhitungan laporan dan memperbaiki query agregasi pendapatan.

**Bukti:**
`report_api.php` menggunakan fungsi `SUM(price)` untuk menghitung pendapatan berdasarkan status pesanan.

# AI Usage Statement

**Tool:** Claude (Anthropic) dalam mode chat.

**Untuk apa:**
Membantu menganalisis source code PHP, MySQL, dan alur sistem WeCleanIt untuk menemukan penyebab bug serta memberikan rekomendasi perbaikan pada fitur yang mengalami masalah.

### Prompt utama:

1. "Analisis kemungkinan penyebab fitur upload foto profil gagal pada aplikasi PHP dan berikan solusi perbaikannya."
2. "Periksa kemungkinan penyebab data statistik dashboard, laporan keuangan, status cleaner, dan fitur manajemen paket tidak terupdate secara otomatis."

### Bagian output AI yang dipakai:

* Analisis proses upload file dan penyimpanan foto profil.
* Analisis sinkronisasi status cleaner dengan status pesanan.
* Analisis proses CRUD paket layanan.
* Analisis fitur konfirmasi pembayaran.
* Analisis query statistik dashboard (pesanan hari ini dan pendapatan).
* Analisis query laporan keuangan dan perhitungan pendapatan.

### Bug yang dianalisis menggunakan AI:

1. Edit profil (upload foto profil) tidak berhasil.
2. Status cleaner tidak terupdate otomatis.
3. Tombol tambah paket tidak berfungsi.
4. Fitur konfirmasi pembayaran belum tersedia.
5. Statistik pesanan hari ini dan pendapatan tidak update.
6. Laporan keuangan tidak update.

### Bagian yang saya ubah + alasan:

Hasil analisis AI tidak langsung digunakan seluruhnya. Setiap rekomendasi diperiksa kembali secara manual pada source code WeCleanIt untuk memastikan kesesuaiannya dengan implementasi sistem. Solusi yang digunakan kemudian disesuaikan dengan struktur database, API, dan kebutuhan aplikasi agar perbaikan yang dilakukan benar-benar dapat menyelesaikan bug yang ditemukan.


## Cara Menjalankan Project
---
# Requirement
Pastikan perangkat telah menginstal:

PHP 8.0 atau lebih baru
MySQL / MariaDB
XAMPP atau Laragon
Web Browser (Google Chrome, Microsoft Edge, dsb.)

# Langkah-langkah
1. Clone Repository
git clone https://github.com/username/wecleanit.git
cd wecleanit

Atau jika project masih berbentuk folder, cukup pindahkan folder project ke dalam direktori htdocs (XAMPP) atau www (Laragon).

2. Jalankan Web Server
Buka XAMPP Control Panel
Aktifkan:
Apache
MySQL
3. Import Database
Buka browser
http://localhost/phpmyadmin
Buat database baru dengan nama
wecleanit_db
Pilih database wecleanit_db
Klik menu Import
Pilih file
database.sql
Klik Go untuk mengimpor database.
4. Konfigurasi Database

Buka file

koneksi.php

Pastikan konfigurasi sesuai dengan database lokal.

$host     = "localhost";
$username = "root";
$password = "";
$database = "wecleanit_db";

Apabila menggunakan password MySQL, ubah bagian:

$password = "password_mysql";
5. Jalankan Project

Buka browser dan akses:

http://localhost/wecleanit/

atau

http://localhost/wecleanit/Index.html
Akun Default
Role	Nomor WhatsApp	Password
Admin	081234567890 (sesuaikan isi database)	password
Customer	Daftar melalui menu Register	Password sesuai saat registrasi

Catatan: Akun admin mengikuti data yang terdapat pada tabel users di database.

Struktur Project
wecleanit/
│
├── Index.html
├── auth.php
├── dashboardAdmin.php
├── dashboardCustomer.php
├── koneksi.php
├── uploads/
│
├── api/
│   ├── auth_api.php
│   ├── cleaner_api.php
│   ├── customer_api.php
│   ├── order_api.php
│   ├── package_api.php
│   ├── profile_api.php
│   └── report_api.php
│
└── database.sql
Troubleshooting
Database gagal terkoneksi

Pastikan:

Apache dan MySQL sudah berjalan.
Nama database adalah:
wecleanit_db
Konfigurasi pada koneksi.php sudah benar.
Halaman kosong (Blank Page)

Aktifkan error reporting pada PHP.

error_reporting(E_ALL);
ini_set('display_errors', 1);
Database belum ditemukan

Import kembali file:

database.sql

ke database wecleanit_db.

Login gagal

Pastikan:

Data akun sudah tersedia pada tabel users.
Password sesuai dengan data yang tersimpan di database.
Gambar Profil Tidak Muncul

Pastikan folder:

uploads/profiles/

sudah tersedia dan memiliki izin akses (read/write) agar proses upload gambar dapat berjalan dengan baik.
