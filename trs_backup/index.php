<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>Daftar Backup Transaksi</h2>
<a href="../trs_backup/backup.php" class="btn btn-primary">Backup Transaksi</a>
<br><br>
<h3>Backup Tabel trs</h3>
<table border="1">
    <tr>
        <th>No Transaksi</th>
        <th>Kode Menu</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>
    <?php
    $sql_trs = "SELECT * FROM trs_backup";
    $result_trs = $conn->query($sql_trs);

    if ($result_trs->num_rows > 0) {
        while($row = $result_trs->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['no_trs']}</td>
                    <td>{$row['kd_menu']}</td>
                    <td>{$row['jml']}</td>
                    <td>{$row['hrg']}</td>
                    <td>{$row['total']}</td>
                    <td><a href='../trs_backup/delete_backup.php?no_trs={$row['no_trs']}' class='btn btn-danger'>Hapus</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
    }
    ?>
</table>

<br><br>

<h3>Backup Tabel mtrs</h3>
<table border="1">
    <tr>
        <th>No Transaksi</th>
        <th>Tanggal Transaksi</th>
        <th>Kode Karyawan</th>
        <th>Nama Pelanggan</th>
        <th>Aksi</th>
    </tr>
    <?php
    $sql_mtrs = "SELECT * FROM mtrs_backup";
    $result_mtrs = $conn->query($sql_mtrs);

    if ($result_mtrs->num_rows > 0) {
        while($row = $result_mtrs->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['no_trs']}</td>
                    <td>{$row['tgl_trs']}</td>
                    <td>{$row['kd_kyw']}</td>
                    <td>{$row['nm_plg']}</td>
                    <td><a href='../trs_backup/delete_backup.php?no_trs={$row['no_trs']}' class='btn btn-danger'>Hapus</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
    }
    ?>
</table>

<?php include('../partials/footer.php'); ?>
