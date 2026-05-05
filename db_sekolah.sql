-- SQL Script untuk Database SMP Kusuma Bangsa
-- Jalankan di phpMyAdmin dengan cara:
-- 1. Buka http://localhost/phpmyadmin
-- 2. Klik tab 'SQL' atau pilih database 'db_sekolah' lalu 'Import'
-- 3. Jika belum ada, buat database 'db_sekolah' terlebih dahulu
-- 4. Import file ini (db_sekolah.sql)
-- 5. Klik tombol 'Go' atau 'Import'

CREATE DATABASE IF NOT EXISTS `db_sekolah` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_sekolah`;

DROP TABLE IF EXISTS `galeri`;
DROP TABLE IF EXISTS `informasi`;
DROP TABLE IF EXISTS `pengaturan`;
DROP TABLE IF EXISTS `pengguna`;

-- 1. Buat tabel pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Buat tabel galeri
CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Buat tabel informasi
CREATE TABLE IF NOT EXISTS `informasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Judul` varchar(255) NOT NULL,
  `Keterangan` longtext NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  FOREIGN KEY (`uid`) REFERENCES `pengguna`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Buat tabel pengaturan (untuk data profil sekolah)
CREATE TABLE IF NOT EXISTS `pengaturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `google_maps` longtext,
  `logo` varchar(255),
  `favicon` varchar(255),
  `nama_kepsek` varchar(255) DEFAULT NULL,
  `sambutan_kepsek` longtext DEFAULT NULL,
  `foto_kepsek` varchar(255) DEFAULT NULL,
  `tentang_sekolah` longtext DEFAULT NULL,
  `foto_sekolah` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Insert data default untuk pengaturan sekolah
INSERT INTO `pengaturan` (`id`, `nama`, `email`, `telepon`, `alamat`, `google_maps`, `logo`, `favicon`, `nama_kepsek`, `sambutan_kepsek`, `foto_kepsek`, `tentang_sekolah`, `foto_sekolah`) 
VALUES (1, 'SMP Kusuma Bangsa', 'info@smpkusumabangsa.sch.id', '021-XXXXXX', 'Jalan Pendidikan No. 123', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ON DUPLICATE KEY UPDATE id=id;

-- 6. Insert data default untuk super admin

-- 6. Insert data default untuk super admin
-- Password: smpkusumabangsa123 (MD5: e4de0d9c7270b29a84a20f6c9b2f5367)
INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`, `level`) 
VALUES (1, 'Super Admin', 'admin', 'e4de0d9c7270b29a84a20f6c9b2f5367', 'super_admin')
ON DUPLICATE KEY UPDATE id=id;

INSERT INTO `informasi` (`id`, `Judul`, `Keterangan`, `Gambar`, `uid`) 
VALUES (1, 'Selamat Datang di SMP Kusuma Bangsa', 'Selamat datang di website resmi SMP Kusuma Bangsa. Temukan informasi terbaru, galeri kegiatan, dan berita sekolah di sini.', '', 1)
ON DUPLICATE KEY UPDATE id=id;