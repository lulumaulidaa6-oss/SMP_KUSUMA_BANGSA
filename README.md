# Website SMP Kusuma Bangsa (Kubang)

Website profil sekolah SMP Kusuma Bangsa yang dibangun menggunakan PHP Native dan MySQL. Proyek ini dilengkapi dengan Panel Admin untuk pengelolaan konten berita, galeri, dan profil sekolah.

## 🚀 Prasyarat

Sebelum menjalankan proyek ini, pastikan Anda sudah menginstal lingkungan server lokal:
*   **Laragon** (Direkomendasikan) atau **XAMPP**.
*   **PHP** versi 7.4 atau lebih baru.
*   **MySQL/MariaDB** berjalan pada port standar `3306`.

## 📦 Instalasi

1.  **Clone atau Copy Proyek**:
    Letakkan folder proyek `kubang` di dalam direktori root server lokal Anda:
    *   Laragon: `C:\laragon\www\kubang`
    *   XAMPP: `C:\xampp\htdocs\kubang`

2.  **Jalankan Server**:
    Pastikan service **Apache** dan **MySQL** sudah dalam status **Started**.

## 🗄️ Setup Database

Anda tidak perlu mengimport manual melalui phpMyAdmin. Ikuti langkah otomatis berikut:

1.  Buka browser dan akses:
    `http://localhost/kubang/fix-database.php`
2.  Tunggu hingga muncul pesan **"✓ Database berhasil diperbaiki!"**.
3.  Database `db_sekolah` dan tabel-tabelnya akan dibuat secara otomatis beserta data defaultnya.

## 🔐 Informasi Login Admin

Setelah setup database selesai, Anda dapat masuk ke Panel Admin:

*   **URL Admin**: `http://localhost/kubang/login.php`
*   **Username**: `admin`
*   **Password**: `admin123`

## 📂 Struktur Folder Utama

*   `/admin` : File pengelolaan konten oleh administrator.
*   `/assets` : File CSS, gambar, dan aset frontend.
*   `/uploads` : Tempat penyimpanan file yang diunggah (logo, foto berita, dll).
*   `koneksi.php` : Konfigurasi koneksi database.
*   `fix-database.php` : Script utility untuk reset/inisialisasi database.

---
*Dibuat untuk memudahkan pengembangan dan deployment proyek SMP Kusuma Bangsa.*
