<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>Tambah Karyawan</h2>
<form action="" method="post">
    <label for="kd_kyw">Kode Karyawan:</label><br>
    <input type="text" id="kd_kyw" name="kd_kyw"><br>
    <label for="nm_kyw">Nama Karyawan:</label><br>
    <input type="text" id="nm_kyw" name="nm_kyw"><br>
    <label for="almt">Alamat:</label><br>
    <input type="text" id="almt" name="almt"><br>
    <label for="telp">Telepon:</label><br>
    <input type="text" id="telp" name="telp"><br>
    <label for="jns_kel">Jenis Kelamin:</label><br>
    <select id="jns_kel" name="jns_kel">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select><br><br>
    <input type="submit" name="submit" value="Tambah">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kd_kyw = $_POST['kd_kyw'];
    $nm_kyw = $_POST['nm_kyw'];
    $almt = $_POST['almt'];
    $telp = $_POST['telp'];
    $jns_kel = $_POST['jns_kel'];

    $sql = "INSERT INTO karyawan (kd_kyw, nm_kyw, almt, telp, jns_kel) VALUES ('$kd_kyw', '$nm_kyw', '$almt', '$telp', '$jns_kel')";
    if ($conn->query($sql) === TRUE) {
        echo "Karyawan berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<?php include('../partials/footer.php'); ?>
