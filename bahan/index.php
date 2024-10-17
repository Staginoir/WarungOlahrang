<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<div class="container">
    <h2>Daftar Bahan</h2>
    <a href="insert.php">Tambah Bahan</a>
    <a href="daftar_faktur.php" style="margin-left: 10px;">Daftar Faktur</a>
    <table class="data-table">
        <tr>
            <th>Kode Bahan</th>
            <th>Nama Bahan</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT * FROM bahan";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['kd_bhn']}</td>
                        <td>{$row['nm_bhn']}</td>
                        <td>{$row['satuan']}</td>
                        <td>{$row['jml_bhn']}</td>
                        <td>{$row['hrg_bhn']}</td>
                        <td>
                            <a href='update.php?kd_bhn={$row['kd_bhn']}'>Edit</a> |
                            <a href='delete.php?kd_bhn={$row['kd_bhn']}' onclick='return confirm(\"Apakah anda yakin ingin menghapus bahan ini?\");'>Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</div>

<?php include('../partials/footer.php'); ?>
