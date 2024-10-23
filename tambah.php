<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $conn = new mysqli("localhost", "root", "password123", "db_makanan");
    $sql = "INSERT INTO makanan (nama, harga, deskripsi) VALUES ('$nama', $harga, '$deskripsi')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Makanan</title>
</head>
<body>
    <h1>Tambah Makanan</h1>
    <form method="POST">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br>
        <label>Harga:</label><br>
        <input type="number" name="harga" required><br>
        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required></textarea><br>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
