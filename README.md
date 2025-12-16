
# 🛒 Sistem Manajemen Inventori & Penjualan UMKM

![Status](https://img.shields.io/badge/Status-Development-orange)
![Laravel](https://img.shields.io/badge/Laravel-9.x-FF2D20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap&logoColor=white)

**Sistem Manajemen Inventori & Penjualan UMKM** adalah aplikasi web modern yang dirancang untuk mendigitalkan operasional warung atau toko kelontong. Mencakup manajemen stok, kasir (POS), dan pelaporan keuangan real-time.

---

## �️ Tech Stack

- **Backend**: Laravel 9 Framework (PHP 8.2)
- **Frontend**: Blade Templates, Bootstrap 5, Vanilla CSS/JS
- **Database**: MySQL / MariaDB
- **PDF & Excel**: `barryvdh/laravel-dompdf`, `maatwebsite/excel`
- **Barcode**: `milon/barcode`

## 📂 Project Structure

Berikut adalah struktur direktori utama dari source code aplikasi ini:

```bash
umkm-inventori/
├── app/
│   ├── Http/Controllers/    # Logika Bisnis & Controller
│   │   ├── POSController.php          # Handle transaksi kasir
│   │   ├── ProductController.php      # CRUD Produk
│   │   ├── ReportController.php       # Laporan & Ekspor Excel
│   │   └── ...
│   └── Models/              # Eloquent Models (Database Schema)
│       ├── Product.php      # Model Produk
│       ├── Sale.php         # Model Penjualan
│       └── User.php         # Model User & Autentikasi
├── resources/
│   └── views/               # Tampilan Frontend (Blade)
│       ├── dashboard/       # Halaman Dashboard Utama
│       ├── pos/             # Antarmuka Kasir
│       ├── products/        # Manajemen Produk
│       └── reports/         # Halaman Laporan
└── routes/
    └── web.php              # Definisi Routing Aplikasi
```

## ✨ Fitur Unggulan

### 🏪 Machine Learning? Bukan, ini Kasir Pintar!
Sistem ini memiliki " otak" bisnis yang kuat:
- **Smart Stock**: Otomatis mengurangi stok saat transaksi terjadi.
- **Barcode**: Input produk cepat dengan sesuai barcode.
- **Thermal Print**: Cetak struk belanja profesional untuk pelanggan.

### � Laporan & Analitik
- **Real-time Dashboard**: Pantau omzet harian dan produk terlaris.
- **Ekspor Data**: Unduh laporan penjualan format Excel (`.xlsx`) untuk audit bulanan.

## � Installation Setup

Ikuti langkah berikut untuk menjalankan projek di lokal komputer Anda:

### 1. Prerequisites
Pastikan Anda sudah menginstal:
- PHP >= 8.1
- Composer
- Node.js & NPM

### 2. Clone & Install
```bash
git clone https://github.com/username/umkm-inventori.git
cd umkm-inventori
composer install
npm install && npm run build
```

### 3. Environment Config (.env)
Duplikat file `.env.example` menjadi `.env`, lalu atur koneksi database:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_umkm
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Running the App
Jalankan perintah berikut secara berurutan:

```bash
# Generate App Key
php artisan key:generate

# Migrasi Database
php artisan migrate

# Jalankan Server
php artisan serve
```

Buka [http://localhost:8000](http://localhost:8000) di browser Anda.

## � Author

**Calvin**
- Project: Tugas Akhir
- Fokus: Web Development & System Digitization

---

