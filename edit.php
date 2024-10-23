<?php
$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "140194", "db_makanan");
$result = $conn->query("SELECT * FROM makanan WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "UPDATE makanan SET nama='$nama', harga=$harga, deskripsi='$deskripsi' WHERE id=$id";

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
    <title>Edit Makanan</title>
</head>
<body>
    <h1>Edit Makanan</h1>
    <form method="POST">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $row['nama']; ?>" required><br>
        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?= $row['harga']; ?>" required><br>
        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required><?= $row['deskripsi']; ?></textarea><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
