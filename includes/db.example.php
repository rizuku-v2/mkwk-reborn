<?php
// Salin file ini menjadi db.php dan sesuaikan konfigurasi
$host = "localhost";
$user = "root";
$pass = "";        // Password MySQL (default XAMPP: kosong)
$db   = "db_mkwk";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
?>