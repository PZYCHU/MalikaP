<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];

    if (!empty($name) && !empty($age)) {
        // Escape input untuk mencegah SQL Injection
        $name = $conn->real_escape_string($name);
        $age = $conn->real_escape_string($age);

        // Query SQL
        $sql = "INSERT INTO users (name, age) VALUES ('$name', '$age')";

        // Debug: cetak query SQL
        echo "Query: " . $sql . "<br>";

        // Eksekusi query dan cek apakah berhasil
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil ditambahkan!";
        } else {
            // Debug: cetak pesan error dari MySQL
            echo "Error: " . $conn->error . "<br>";
        }
    } else {
        echo "Semua field harus diisi!";
    }

    $conn->close();
}
?>
