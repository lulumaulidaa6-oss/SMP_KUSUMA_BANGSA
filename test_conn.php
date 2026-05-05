<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testing koneksi.php...<br>";
include 'koneksi.php';

echo "After koneksi.php include<br>";
echo "conn type: " . gettype($conn) . "<br>";
echo "conn connected: " . ($conn ? 'yes' : 'no') . "<br>";

echo "Testing admin/header.php...<br>";
include 'admin/header.php';
echo "After admin/header.php include<br>";
echo "conn type: " . gettype($conn) . "<br>";
?>
