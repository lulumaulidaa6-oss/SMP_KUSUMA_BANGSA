<?php
/**
 * Script untuk memperbaiki database yang corrupted
 * Akses: http://localhost/smp_kusuma-bangsa/fix-database.php
 */

$host = '127.0.0.1';
$port = 3307; // Gunakan port MySQL XAMPP yang berjalan pada 3307
$user = 'root';
$pass = '';
$db = 'db_sekolah';

mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect($host, $user, $pass, NULL, $port);

if (!$conn) {
    die('Gagal terhubung ke MySQL: ' . mysqli_connect_error());
}

// 1. Drop database yang corrupted
echo "Menghapus database lama...<br>";
$drop = mysqli_query($conn, "DROP DATABASE IF EXISTS `db_sekolah`");
if (!$drop) {
    die('Error saat drop database: ' . mysqli_error($conn));
}
echo "✓ Database lama berhasil dihapus<br>";

// 2. Baca file SQL
echo "Membaca file SQL...<br>";
$sql_file = __DIR__ . '/db_sekolah.sql';
if (!file_exists($sql_file)) {
    die('File db_sekolah.sql tidak ditemukan!');
}

$sql_content = file_get_contents($sql_file);
$statements = array_filter(array_map('trim', explode(';', $sql_content)));

// 3. Execute setiap statement
echo "Menjalankan script SQL...<br>";
$count = 0;
foreach ($statements as $statement) {
    if (!empty($statement)) {
        if (stripos($statement, 'CREATE DATABASE') !== false || 
            stripos($statement, 'USE') !== false ||
            stripos($statement, 'DROP TABLE') !== false ||
            stripos($statement, 'CREATE TABLE') !== false ||
            stripos($statement, 'INSERT INTO') !== false) {
            
            if (!mysqli_query($conn, $statement . ';')) {
                echo '✗ Error: ' . mysqli_error($conn) . '<br>';
            } else {
                $count++;
            }
        }
    }
}

echo "✓ {$count} query berhasil dijalankan<br>";

// 4. Verify koneksi ke database
$conn2 = mysqli_connect($host, $user, $pass, $db, $port);
if ($conn2) {
    echo "✓ Database berhasil diperbaiki!<br>";
    $tables = mysqli_query($conn2, "SHOW TABLES");
    echo "Tabel yang ada:<br>";
    while ($row = mysqli_fetch_row($tables)) {
        echo "- " . $row[0] . "<br>";
    }
    mysqli_close($conn2);
} else {
    echo "✗ Gagal terhubung ke database: " . mysqli_connect_error() . "<br>";
}

mysqli_close($conn);
?>
<hr>
<p><a href="index.php">Kembali ke Dashboard</a></p>
