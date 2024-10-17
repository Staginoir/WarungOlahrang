<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>Edit Bahan</h2>

<?php
$kd_bhn = $_GET['kd_bhn'];
$sql = "SELECT * FROM bahan WHERE kd_bhn='$kd_bhn'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<form action="" method="post">
    <label for="nm_bhn">Nama Bahan:</label><br>
    <input type="text" id="nm_bhn" name="nm_bhn" value="<?php echo $row['nm_bhn']; ?>"><br>
    <label for="satuan">Satuan:</label><br>
    <input type="text" id="satuan" name="satuan" value="<?php echo $row['satuan']; ?>"><br>
    <label for="jml_bhn">Jumlah:</label><br>
    <input type="number" id="jml_bhn" name="jml_bhn" value="<?php echo $row['jml_bhn']; ?>"><br>
    <label for="hrg_bhn">Harga:</label><br>
    <input type="number" id="hrg_bhn" name="hrg_bhn" value="<?php echo $row['hrg_bhn']; ?>"><br><br>
    <input type="submit" name="submit" value="Update">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nm_bhn = $_POST['nm_bhn'];
    $satuan = $_POST['satuan'];
    $jml_bhn = $_POST['jml_bhn'];
    $hrg_bhn = $_POST['hrg_bhn'];

    $sql = "UPDATE bahan SET nm_bhn='$nm_bhn', satuan='$satuan', jml_bhn=$jml_bhn, hrg_bhn=$hrg_bhn WHERE kd_bhn='$kd_bhn'";
    if ($conn->query($sql) === TRUE) {
        echo "Bahan berhasil diupdate.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<?php include('../partials/footer.php'); ?>
