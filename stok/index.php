<?php
// Include header and database connection
include('../partials/header.php');
include('../config/database.php');
?>

<div class="container">
    <h2>Daftar Stok</h2>
    <a href="insert.php">Tambah Stok</a>
    <table class="data-table">
        <tr>
            <th>Kode Stok</th>
            <th>Nama Stok</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Kode Bahan</th> <!-- Tambah kolom Kode Bahan di sini -->
            <th>Aksi</th>
        </tr>
        <?php
        // Query SQL untuk mengambil data stok beserta kd_bhn
        $sql = "SELECT s.kd_stok, s.nm_stok, s.satuan, s.jml_stok, s.hrg_beli, s.gbr, s.kd_bhn, b.nm_bhn
                FROM stok s
                LEFT JOIN bahan b ON s.kd_bhn = b.kd_bhn";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['kd_stok']}</td>
                        <td>{$row['nm_stok']}</td>
                        <td>{$row['satuan']}</td>
                        <td>{$row['jml_stok']}</td>
                        <td>{$row['hrg_beli']}</td>
                        <td><img src='../images/stok/{$row['gbr']}' alt='{$row['nm_stok']}' class='thumbnail'></td>
                        <td>{$row['kd_bhn']} - {$row['nm_bhn']}</td> <!-- Tampilkan kd_bhn dan nm_bhn -->
                        <td>
                            <a href='update.php?kd_stok={$row['kd_stok']}'>Edit</a> |
                            <a href='delete.php?kd_stok={$row['kd_stok']}' onclick='return confirm(\"Apakah anda yakin ingin menghapus stok ini?\");'>Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</div>

<?php include('../partials/footer.php'); ?>
