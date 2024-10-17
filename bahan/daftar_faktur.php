<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<div class="container">
    <h2>Daftar Faktur</h2>
    <a href="../trs/insert.php">Tambah Faktur</a> <!-- Tombol untuk menambahkan faktur baru -->
    <table class="data-table">
        <tr>
            <th>NO</th>
            <th>NO FAKTUR</th>
            <th>TANGGAL FAKTUR</th>
            <th>TOTAL BARANG JASA</th>
            <th>NAMA</th>
            <th>HARGA</th>
            <th>TOTAL</th>
            <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT * FROM Faktur";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['no']}</td>
                        <td>{$row['NO_FAKTUR']}</td>
                        <td>{$row['TANGGAL_FAKTUR']}</td>
                        <td>{$row['TOTAL_BARANG_JASA']}</td>
                        <td>{$row['NAMA']}</td>
                        <td>{$row['HARGA']}</td>
                        <td>{$row['TOTAL']}</td>
                        <td>
                            <a href='../trs/update.php?no={$row['no']}'>Edit</a> |
                            <a href='../trs/delete.php?no={$row['no']}' onclick='return confirm(\"Apakah anda yakin ingin menghapus faktur ini?\");'>Hapus</a>
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
