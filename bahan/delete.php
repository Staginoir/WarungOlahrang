<?php include('../config/database.php'); ?>

<?php
$kd_bhn = $_GET['kd_bhn'];
$sql = "DELETE FROM bahan WHERE kd_bhn='$kd_bhn'";

if ($conn->query($sql) === TRUE) {
    echo "Bahan berhasil dihapus.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
exit();
?>
