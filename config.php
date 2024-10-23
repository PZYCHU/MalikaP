<?php
// Konfigurasi Database
$servername = "localhost";  // Host database, biasanya localhost
$username = "root";         // Username MySQL
$password = "140194";             // Password MySQL (kosong jika menggunakan default di localhost)
$dbname = "crud_database";  // Nama database yang akan digunakan

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk menutup koneksi
function closeConnection($conn) {
    $conn->close();
}
?>
