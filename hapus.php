<?php
$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "140194", "db_makanan");

$sql = "DELETE FROM makanan WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
