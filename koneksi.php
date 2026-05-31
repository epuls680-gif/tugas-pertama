<?php
// konfigurasi database
$host = "localhost"; // host database
$username = "root"; // username database
$password = ""; // password database
$dbname = "bootcamp"; // nama database

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi ke database berhasil!";
}

// Ambil data dari tabel
$query = mysqli_query($conn, "SELECT * FROM users");

?>
