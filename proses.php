<?php
// Cek apakah form dikirim menggunakan method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form
    $name = htmlspecialchars(trim($_POST['name']));
    $harga = htmlspecialchars(trim($_POST['harga']));
    $deskripsi = htmlspecialchars(trim($_POST['deskripsi']));

    //Validasi sederhana
    if (empty($name) || empty($harga)) {
        echo "Nama dan harga harus diisi.";
        exit;
    }

    // Tampilkan hasil input
    echo "<h2>Data Berhasil Diproses</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Harga:</strong> $harga</p>";
    echo "<p><strong>Deskripsi:</strong><br>" . nl2br($deskripsi) . "</p>";
} else {
    echo "Form belum dikirim.";
}
?>