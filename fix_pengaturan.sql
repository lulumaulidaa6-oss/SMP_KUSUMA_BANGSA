USE `db_sekolah`;

DROP TABLE IF EXISTS `pengaturan`;

CREATE TABLE `pengaturan` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pengaturan` (`nama`,`email`,`telepon`,`alamat`) VALUES
('SMP Kusuma Bangsa','info@smpkusumabangsa.sch.id','021-XXXXXX','Jalan Pendidikan No. 123');
