# WeCleanIt

## Deskripsi
WeCleanIt merupakan platform aplikasi web penyedia layanan jasa kebersihan yang dirancang khusus untuk area Mataram dan sekitarnya. Target utamanya adalah mahasiswa, karyawan, dan rumah tangga yang menyewa kosan dan membutuhkan layanan kebersihan (sapu, pel, sikat kamar mandi, dll) secara praktis, transparan, dan terpercaya.

Sistem ini mengubah cara tradisional (pesan manual lewat chat yang rentan miskomunikasi) menjadi sistem pemesanan mandiri (sistem booking otomatis) yang rapi, baik untuk pelanggan maupun pengelola bisnis (Admin).
## Alamat
[http://localhost]

## Menu Utama
```
WeCleanIt
│
├── Landing Page
│   └── index.html
│       ├── Beranda
│       ├── Layanan
│       ├── Tentang Kami
│       ├── Harga Paket
│       ├── Testimoni
│       ├── Kontak
│       └── Login / Daftar
│
├── Autentikasi
│   └── auth.php
│       ├── Login
│       └── Registrasi
│
├── Dashboard Customer
│   └── dashboardCustomer.php
│       ├── Beranda
│       ├── Pesan Layanan
│       │   ├── Pilih Paket
│       │   ├── Tentukan Jadwal
│       │   └── Buat Pesanan
│       ├── Riwayat Pesanan
│       ├── Profil
│       │   ├── Lihat Profil
│       │   └── Edit Profil
│       └── Logout
│
├── Dashboard Admin
│   └── dashboardAdmin.php
│       ├── Ringkasan (Overview)
│       ├── Manajemen Pesanan
│       ├── Manajemen Petugas
│       ├── Manajemen Customer
│       ├── Manajemen Paket
│       ├── Laporan
│       └── Logout
│
└── API Backend
    ├── auth_api.php
    │   ├── Login
    │   ├── Register
    │   └── Logout
    │
    ├── customer_api.php
    │   ├── Data Customer
    │   └── CRUD Customer
    │
    ├── profile_api.php
    │   ├── Lihat Profil
    │   └── Update Profil
    │
    ├── order_api.php
    │   ├── Tambah Pesanan
    │   ├── Lihat Pesanan
    │   ├── Update Status
    │   └── Hapus Pesanan
    │
    ├── package_api.php
    │   ├── Lihat Paket
    │   ├── Tambah Paket
    │   ├── Edit Paket
    │   └── Hapus Paket
    │
    ├── cleaner_api.php
    │   ├── Data Petugas
    │   ├── Tambah Petugas
    │   ├── Edit Petugas
    │   └── Hapus Petugas
    │
    └── report_api.php
        ├── Laporan Harian
        ├── Laporan Bulanan
        └── Statistik
```
## SiteMap
```
WeCleanIt
│
├── Landing Page
│   └── index.html
│       ├── Beranda
│       ├── Layanan
│       ├── Tentang Kami
│       ├── Harga Paket
│       ├── Testimoni
│       ├── Kontak
│       └── Login / Daftar
│
├── Autentikasi
│   └── auth.php
│       ├── Login
│       └── Registrasi
│
├── Dashboard Customer
│   └── dashboardCustomer.php
│       ├── Beranda
│       ├── Pesan Layanan
│       │   ├── Pilih Paket
│       │   ├── Tentukan Jadwal
│       │   └── Buat Pesanan
│       ├── Riwayat Pesanan
│       ├── Profil
│       │   ├── Lihat Profil
│       │   └── Edit Profil
│       └── Logout
│
├── Dashboard Admin
│   └── dashboardAdmin.php
│       ├── Ringkasan (Overview)
│       ├── Manajemen Pesanan
│       ├── Manajemen Petugas
│       ├── Manajemen Customer
│       ├── Manajemen Paket
│       ├── Laporan
│       └── Logout
│
└── API Backend
    ├── auth_api.php
    │   ├── Login
    │   ├── Register
    │   └── Logout
    │
    ├── customer_api.php
    │   ├── Data Customer
    │   └── CRUD Customer
    │
    ├── profile_api.php
    │   ├── Lihat Profil
    │   └── Update Profil
    │
    ├── order_api.php
    │   ├── Tambah Pesanan
    │   ├── Lihat Pesanan
    │   ├── Update Status
    │   └── Hapus Pesanan
    │
    ├── package_api.php
    │   ├── Lihat Paket
    │   ├── Tambah Paket
    │   ├── Edit Paket
    │   └── Hapus Paket
    │
    ├── cleaner_api.php
    │   ├── Data Petugas
    │   ├── Tambah Petugas
    │   ├── Edit Petugas
    │   └── Hapus Petugas
    │
    └── report_api.php
        ├── Laporan Harian
        ├── Laporan Bulanan
        └── Statistik
```
## Teknologi
HTML, PHP, CSS, Javascript, Tailwind, MySQL

## Requirement
To use Wecleanit you must've had all this installed and configured:
- PHP
- MySQL/MariaDB

