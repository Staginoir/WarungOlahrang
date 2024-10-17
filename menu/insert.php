<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>Tambah Menu</h2>
<form action="" method="post" enctype="multipart/form-data">
    <label for="kd_menu">Kode Menu:</label><br>
    <input type="text" id="kd_menu" name="kd_menu"><br>
    <label for="nm_menu">Nama Menu:</label><br>
    <input type="text" id="nm_menu" name="nm_menu"><br>
    <label for="satuan">Satuan:</label><br>
    <input type="text" id="satuan" name="satuan"><br>
    <label for="hrg_jual">Harga Jual:</label><br>
    <input type="number" id="hrg_jual" name="hrg_jual"><br>
    <label for="gbr">Gambar:</label><br>
    <input type="file" id="gbr" name="gbr"><br><br>
    <label for="kd_stok">Kode Stok:</label><br>
    <select id="kd_stok" name="kd_stok" required>
        <option value="">Pilih Kode Stok</option>
        <?php
        // Ambil data kode stok dari tabel stok
        $sql_stok = "SELECT kd_stok FROM stok";
        $result_stok = $conn->query($sql_stok);
        while ($row_stok = $result_stok->fetch_assoc()) {
            echo "<option value='{$row_stok['kd_stok']}'>{$row_stok['kd_stok']}</option>";
        }
        ?>
    </select><br>
    <input type="submit" name="submit" value="Tambah">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kd_menu = $_POST['kd_menu'];
    $nm_menu = $_POST['nm_menu'];
    $satuan = $_POST['satuan'];
    $hrg_jual = $_POST['hrg_jual'];
    $gbr = $_FILES['gbr']['name'];
    $kd_stok = $_POST['kd_stok']; // Tambahkan kode stok

    $target_dir = "../images/menu/";
    $target_file = $target_dir . basename($gbr);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Memeriksa apakah file adalah gambar
    $check = getimagesize($_FILES['gbr']['tmp_name']);
    if ($check !== false) {
        if (move_uploaded_file($_FILES['gbr']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO menu (kd_menu, nm_menu, satuan, hrg_jual, gbr, kd_stok) 
                    VALUES ('$kd_menu', '$nm_menu', '$satuan', $hrg_jual, '$gbr', '$kd_stok')";
            if ($conn->query($sql) === TRUE) {
                echo "Menu berhasil ditambahkan.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Terjadi kesalahan saat mengupload gambar.";
        }
    } else {
        echo "File bukan gambar.";
    }
}

$conn->close();
?>

<?php include('../partials/footer.php'); ?>
