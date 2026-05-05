<?php
$host = '127.0.0.1';
$port = 3307; // Gunakan port MySQL XAMPP yang berjalan pada 3307
$user = 'root';
$pass = '';
$db = 'db_sekolah';

mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die('Gagal terhubung ke database: ' . mysqli_connect_error() . '. Pastikan MySQL (XAMPP) berjalan di port 3307 dan database "db_sekolah" sudah dibuat.');
}
?>