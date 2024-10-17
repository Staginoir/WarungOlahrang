<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>Tambah Bahan</h2>
<form action="" method="post">
    <label for="kd_bhn">Kode Bahan:</label><br>
    <input type="text" id="kd_bhn" name="kd_bhn"><br>
    <label for="nm_bhn">Nama Bahan:</label><br>
    <input type="text" id="nm_bhn" name="nm_bhn"><br>
    <label for="satuan">Satuan:</label><br>
    <input type="text" id="satuan" name="satuan"><br>
    <label for="jml_bhn">Jumlah:</label><br>
    <input type="number" id="jml_bhn" name="jml_bhn"><br>
    <label for="hrg_bhn">Harga:</label><br>
    <input type="number" id="hrg_bhn" name="hrg_bhn"><br><br>
    <input type="submit" name="submit" value="Tambah">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kd_bhn = $_POST['kd_bhn'];
    $nm_bhn = $_POST['nm_bhn'];
    $satuan = $_POST['satuan'];
    $jml_bhn = $_POST['jml_bhn'];
    $hrg_bhn = $_POST['hrg_bhn'];

    $sql = "INSERT INTO bahan (kd_bhn, nm_bhn, satuan, jml_bhn, hrg_bhn) VALUES ('$kd_bhn', '$nm_bhn', '$satuan', $jml_bhn, $hrg_bhn)";
    if ($conn->query($sql) === TRUE) {
        echo "Bahan berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<?php include('../partials/footer.php'); ?>
