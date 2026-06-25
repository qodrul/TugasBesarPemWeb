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
Proses upload file gagal karena direktori penyimpanan tidak dibuat secara dinamis.
<img width="1036" height="118" alt="image" src="https://github.com/user-attachments/assets/79b5fa04-0fb5-432b-8105-3967f371c03b" />


**Fix (apa yang diubah):**
Menambahkan pengecekan keberhasilan upload file, memastikan folder upload tersedia, dan membuat direktori secara otomatis jika belumm ada.
<img width="1004" height="256" alt="image" src="https://github.com/user-attachments/assets/857ea296-eb9f-43f4-9e1c-fe593e9c7e11" />


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
<img width="1600" height="540" alt="image" src="https://github.com/user-attachments/assets/c998adf0-796c-40c6-ab64-989b2fdd2ac0" />


**Fix (apa yang diubah):**
Menambahkan query update status cleaner pada proses konfirmasi dan penyelesaian pesanan sehingga status berubah secara otomatis.
<img width="1600" height="638" alt="image" src="https://github.com/user-attachments/assets/d5c64606-2a61-4df3-82f0-40eac1a826ad" />


**Bukti:**
Data cleaner tersimpan pada tabel `cleaners`, namun tidak ditemukan mekanisme sinkronisasi otomatis dengan status pesanan.

---

## Bug 3 — Statistik Pesanan Hari Ini dan Pendapatan Tidak Update

**Gejala:**
Jumlah pesanan hari ini dan total pendapatan pada dashboard admin tidak berubah meskipun terdapat pesanan baru.

**Langkah Reproduksi:**

1. Customer membuat pesanan baru.
2. Admin membuka dashboard.
3. Statistik tetap menampilkan data lama.

**Hipotesis Penyebab:**
Query dashboard tidak menghitung data terbaru atau data hanya diperbarui saat halaman pertama kali dimuat.
<img width="801" height="36" alt="image" src="https://github.com/user-attachments/assets/ea452002-e00a-4f73-9bb9-ac2941ef68ec" />


**Fix (apa yang diubah):**
Query diubah agar memfilter berdasarkan kolom DATE(created_at) (yaitu tanggal riil saat pesanan masuk/dibuat di database).
<img width="1594" height="76" alt="image" src="https://github.com/user-attachments/assets/8b8a5442-5322-4a71-b458-0e07e3b8c366" />


**Bukti:**
`report_api.php` menggunakan query perhitungan pesanan dan pendapatan berdasarkan data transaksi yang tersimpan.

---

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


# Cara Menjalankan Project

## Requirement

* PHP 8.0 atau lebih baru
* MySQL / MariaDB
* XAMPP atau Laragon
* Web Browser (Chrome, Firefox, Edge)
* Git (Opsional)

---

## Langkah-langkah

### 1. Clone Repository

```bash
git clone https://github.com/username/wecleanit.git
cd wecleanit
```

Atau ekstrak file project ke dalam folder:

```text
htdocs/wecleanit
```

jika menggunakan XAMPP.

---

### 2. Jalankan Apache dan MySQL

Buka XAMPP Control Panel kemudian aktifkan:

* Apache
* MySQL

Pastikan kedua service berjalan tanpa error.

---

### 3. Buat Database

Buka phpMyAdmin melalui:

```text
http://localhost/phpmyadmin
```

Kemudian buat database baru:

```sql
CREATE DATABASE wecleanit_db;
```

---

### 4. Import Database

Pilih database:

```text
wecleanit_db
```

Kemudian import file SQL yang tersedia pada project.

Misalnya:

```text
database/wecleanit_db.sql
```

atau file backup database yang disediakan.

---

### 5. Konfigurasi Koneksi Database

Buka file:

```text
koneksi.php
```

Pastikan konfigurasi sesuai dengan database lokal:

```php
$host     = "localhost";
$username = "root";
$password = "";
$database = "wecleanit_db";
```

Sesuaikan apabila menggunakan username atau password database yang berbeda.

---

### 6. Simpan Project di Folder Web Server

Jika menggunakan XAMPP:

```text
C:\xampp\htdocs\wecleanit
```

Jika menggunakan Laragon:

```text
C:\laragon\www\wecleanit
```

---

### 7. Jalankan Aplikasi

Buka browser dan akses:

```text
http://localhost/wecleanit
```

atau

```text
http://localhost/wecleanit/Index.html
```

sesuai struktur project.

---

## Akun Default

### Admin

```text
Username : admin
Password : admin123
```

### Customer

```text
Username : customer
Password : customer123
```

Catatan: Sesuaikan akun di atas dengan data yang terdapat pada tabel `users` di database.

---

## Troubleshooting

### MySQL Shutdown Unexpectedly

Jika MySQL tidak dapat dijalankan:

1. Tutup XAMPP.
2. Backup folder:

```text
xampp/mysql/data
```

3. Salin isi folder:

```text
xampp/mysql/backup
```

ke folder:

```text
xampp/mysql/data
```

4. Jalankan kembali MySQL.

---

### Error Koneksi Database

Jika muncul pesan:

```text
Koneksi ke database gagal
```

Periksa:

* Apache aktif
* MySQL aktif
* Database `wecleanit_db` sudah dibuat
* Konfigurasi pada `koneksi.php` sudah benar

---

### Gambar Profil Tidak Muncul

Pastikan folder upload tersedia:

```text
uploads/profiles/
```

dan memiliki izin akses untuk menyimpan file.

---

### Data Dashboard Tidak Update

Periksa:

* Data pesanan pada tabel `orders`
* Data paket pada tabel `packages`
* Status transaksi sudah berubah menjadi `Selesai`

karena laporan pendapatan dan statistik dashboard mengambil data dari tabel tersebut.
