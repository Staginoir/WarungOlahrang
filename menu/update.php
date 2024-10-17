<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>Edit Menu</h2>

<?php
$kd_menu = $_GET['kd_menu'];
$sql = "SELECT * FROM menu WHERE kd_menu='$kd_menu'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="nm_menu">Nama Menu:</label><br>
    <input type="text" id="nm_menu" name="nm_menu" value="<?php echo $row['nm_menu']; ?>"><br>
    <label for="satuan">Satuan:</label><br>
    <input type="text" id="satuan" name="satuan" value="<?php echo $row['satuan']; ?>"><br>
    <label for="hrg_jual">Harga Jual:</label><br>
    <input type="number" id="hrg_jual" name="hrg_jual" value="<?php echo $row['hrg_jual']; ?>"><br>
    <label for="gbr">Gambar:</label><br>
    <input type="file" id="gbr" name="gbr"><br>
    <label for="kd_stok">Kode Stok:</label><br>
    <select id="kd_stok" name="kd_stok" required>
        <option value="<?php echo $row['kd_stok']; ?>"><?php echo $row['kd_stok']; ?></option>
        <?php
        // Ambil data kode stok dari tabel stok
        $sql_stok = "SELECT kd_stok FROM stok";
        $result_stok = $conn->query($sql_stok);
        while ($row_stok = $result_stok->fetch_assoc()) {
            if ($row_stok['kd_stok'] != $row['kd_stok']) {
                echo "<option value='{$row_stok['kd_stok']}'>{$row_stok['kd_stok']}</option>";
            }
        }
        ?>
    </select><br><br>
    <input type="submit" name="submit" value="Update">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nm_menu = $_POST['nm_menu'];
    $satuan = $_POST['satuan'];
    $hrg_jual = $_POST['hrg_jual'];
    $gbr = $row['gbr']; // Default gambar lama
    $kd_stok = $_POST['kd_stok']; // Ambil kd_stok dari form

    // Periksa apakah ada gambar baru yang diunggah
    if (!empty($_FILES['gbr']['name'])) {
        $gbr = $_FILES['gbr']['name'];
        $target_dir = "../images/menu/";
        $target_file = $target_dir . basename($gbr);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi gambar
        $check = getimagesize($_FILES['gbr']['tmp_name']);
        if ($check !== false) {
            // Hapus gambar lama jika ada
            if (file_exists($target_dir . $row['gbr'])) {
                unlink($target_dir . $row['gbr']);
            }

            // Upload gambar baru
            if (!move_uploaded_file($_FILES['gbr']['tmp_name'], $target_file)) {
                echo "Terjadi kesalahan saat mengupload gambar.";
                exit();
            }
        } else {
            echo "File bukan gambar.";
            exit();
        }
    }

    $sql = "UPDATE menu SET nm_menu='$nm_menu', satuan='$satuan', hrg_jual=$hrg_jual, gbr='$gbr', kd_stok='$kd_stok' WHERE kd_menu='$kd_menu'";
    if ($conn->query($sql) === TRUE) {
        echo "Menu berhasil diupdate.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<?php include('../partials/footer.php'); ?>
