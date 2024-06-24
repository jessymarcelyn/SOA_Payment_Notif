<?php
// Sesuaikan dengan informasi database Anda
$servername = "localhost"; // Ganti dengan nama server database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "insurance"; // Ganti dengan nama database Anda

// Buat koneksi
$connection = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($connection->connect_error) {
    die("Koneksi database gagal: " . $connection->connect_error);
}
?>

<!-- <?php
    $con = mysqli_connect("localhost", "root", "", "insurance" );
    
?> -->