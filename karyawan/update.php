<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>Edit Karyawan</h2>

<?php
// Cek apakah parameter kd_kyw ada di URL
if (isset($_GET['kd_kyw']) && !empty($_GET['kd_kyw'])) {
    $kd_kyw = $_GET['kd_kyw'];
    
    // Query untuk mengambil data karyawan yang akan diedit
    $sql = "SELECT * FROM karyawan WHERE kd_kyw='$kd_kyw'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Karyawan tidak ditemukan.";
        exit();
    }
} else {
    echo "Kode karyawan tidak disertakan di URL.";
    exit();
}
?>

<!-- Form untuk edit karyawan -->
<form action="" method="post">
    <label for="nm_kyw">Nama Karyawan:</label><br>
    <input type="text" id="nm_kyw" name="nm_kyw" value="<?php echo $row['nm_kyw']; ?>"><br>
    <label for="almt">Alamat:</label><br>
    <input type="text" id="almt" name="almt" value="<?php echo $row['almt']; ?>"><br>
    <label for="telp">Telepon:</label><br>
    <input type="text" id="telp" name="telp" value="<?php echo $row['telp']; ?>"><br>
    <label for="jns_kel">Jenis Kelamin:</label><br>
    <select id="jns_kel" name="jns_kel">
        <option value="L" <?php if ($row['jns_kel'] == 'L') echo 'selected'; ?>>Laki-laki</option>
        <option value="P" <?php if ($row['jns_kel'] == 'P') echo 'selected'; ?>>Perempuan</option>
    </select><br><br>
    <input type="submit" name="submit" value="Update">
</form>

<?php
// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nm_kyw = $_POST['nm_kyw'];
    $almt = $_POST['almt'];
    $telp = $_POST['telp'];
    $jns_kel = $_POST['jns_kel'];

    // Query untuk mengupdate data karyawan
    $sql = "UPDATE karyawan SET nm_kyw='$nm_kyw', almt='$almt', telp='$telp', jns_kel='$jns_kel' WHERE kd_kyw='$kd_kyw'";
    if ($conn->query($sql) === TRUE) {
        echo "Karyawan berhasil diupdate.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>

<?php include('../partials/footer.php'); ?>
