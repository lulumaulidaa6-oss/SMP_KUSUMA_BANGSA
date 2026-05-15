<?php
require 'koneksi.php';
$query = "ALTER TABLE berita ADD kategori VARCHAR(50) DEFAULT 'kategori akademik' AFTER Keterangan";
if (mysqli_query($conn, $query)) {
    echo "Success adding kategori column";
} else {
    echo "Error or already exists: " . mysqli_error($conn);
}
?>
