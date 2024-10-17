<?php include('../config/database.php'); ?>

<?php
$kd_menu = $_GET['kd_menu'];

// Ambil data gambar sebelum dihapus
$sql = "SELECT gbr FROM menu WHERE kd_menu='$kd_menu'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$gbr = $row['gbr'];

// Hapus data dari database
$sql = "DELETE FROM menu WHERE kd_menu='$kd_menu'";
if ($conn->query($sql) === TRUE) {
    // Hapus file gambar jika ada
    if (!empty($gbr) && file_exists("../images/menu/" . $gbr)) {
        unlink("../images/menu/" . $gbr);
    }
    echo "Menu berhasil dihapus.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
exit();
?>
