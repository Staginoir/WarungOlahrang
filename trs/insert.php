<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<div class="container">
    <h2>Tambah Faktur Baru</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="no_faktur">No Faktur:</label>
        <input type="text" id="no_faktur" name="no_faktur" required><br><br>
        <label for="tanggal_faktur">Tanggal Faktur:</label>
        <input type="date" id="tanggal_faktur" name="tanggal_faktur" required><br><br>
        <label for="total_barang_jasa">Total Barang/Jasa:</label>
        <input type="number" id="total_barang_jasa" name="total_barang_jasa" required><br><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" required><br><br>
        <label for="total">Total:</label>
        <input type="number" id="total" name="total" required><br><br>
        <button type="submit">Simpan</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $no_faktur = $_POST['no_faktur'];
        $tanggal_faktur = $_POST['tanggal_faktur'];
        $total_barang_jasa = $_POST['total_barang_jasa'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $total = $_POST['total'];

        $sql = "INSERT INTO Faktur (NO_FAKTUR, TANGGAL_FAKTUR, TOTAL_BARANG_JASA, NAMA, HARGA, TOTAL)
                VALUES ('$no_faktur', '$tanggal_faktur', $total_barang_jasa, '$nama', $harga, $total)";
        if ($conn->query($sql) === TRUE) {
            echo "Faktur berhasil ditambahkan.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</div>

<?php include('../partials/footer.php'); ?>
