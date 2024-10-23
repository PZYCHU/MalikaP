<?php
// Sertakan file konfigurasi untuk koneksi ke database
include 'config.php';

// Jika form dikirim, proses data yang diterima
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Fungsi untuk menambahkan data ke database
    $sql = "INSERT INTO users (name, age) VALUES ('$name', '$age')";
    if ($conn->query($sql) === TRUE) {
        echo "Record berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi setelah selesai
    $conn->close();
}
?>
