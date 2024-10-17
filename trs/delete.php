<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<?php
if (isset($_GET['no'])) {
    $no = $_GET['no'];
    $sql = "DELETE FROM Faktur WHERE NO = $no";
    if ($conn->query($sql) === TRUE) {
        echo "Faktur berhasil dihapus.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<?php include('../partials/footer.php'); ?>
