<?php
$host = 'localhost';  // Nama host, biasanya 'localhost'
$db = 'perpustakaan'; // Nama database
$user = 'root';       // Username MySQL
$pass = '';           // Password MySQL (kosongkan jika menggunakan XAMPP atau WAMP)

$mysqli = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>
