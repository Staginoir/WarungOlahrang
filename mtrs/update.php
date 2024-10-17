<?php
include('../partials/header.php');
include('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_trs = $_POST['no_trs'];
    $tgl_trs = $_POST['tgl_trs'];
    $kd_kyw = $_POST['kd_kyw'];
    $nm_plg = $_POST['nm_plg'];
    $total = $_POST['total'];

    // Query SQL untuk mengupdate data transaksi
    $sql = "UPDATE mtrs SET tgl_trs='$tgl_trs', kd_kyw='$kd_kyw', nm_plg='$nm_plg', total=$total 
            WHERE no_trs='$no_trs'";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo "Data transaksi berhasil diupdate.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mendapatkan data transaksi berdasarkan ID
if (isset($_GET['no_trs'])) {
    $no_trs = $_GET['no_trs'];
    $sql = "SELECT * FROM mtrs WHERE no_trs='$no_trs'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tgl_trs = $row['tgl_trs'];
        $kd_kyw = $row['kd_kyw'];
        $nm_plg = $row['nm_plg'];
        $total = $row['total'];
    } else {
        echo "Data transaksi tidak ditemukan.";
    }
}

$conn->close();
?>

<h2>Update Data Transaksi</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="no_trs" value="<?php echo $no_trs; ?>">
    <label for="tgl_trs">Tanggal Transaksi:</label><br>
    <input type="date" id="tgl_trs" name="tgl_trs" value="<?php echo $tgl_trs; ?>"><br>
    <label for="kd_kyw">Kode Karyawan:</label><br>
    <input type="text" id="kd_kyw" name="kd_kyw" value="<?php echo $kd_kyw; ?>"><br>
    <label for="nm_plg">Nama Pelanggan:</label><br>
    <input type="text" id="nm_plg" name="nm_plg" value="<?php echo $nm_plg; ?>"><br>
    <label for="total">Total Transaksi:</label><br>
    <input type="number" id="total" name="total" value="<?php echo $total; ?>"><br><br>
    <input type="submit" name="submit" value="Update">
</form>

<?php include('../partials/footer.php'); ?>
