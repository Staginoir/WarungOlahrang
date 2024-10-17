<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>View Transaksi</h2>
<table border="1">
    <tr>
        <th>No Transaksi</th>
        <th>Kode Menu</th>
        <th>Nama Menu</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Tanggal Transaksi</th>
        <th>Nama Pelanggan</th>
    </tr>
    <?php
    $sql = "SELECT * FROM v_transaksi";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['no_trs']}</td>
                    <td>{$row['kd_menu']}</td>
                    <td>{$row['nm_menu']}</td>
                    <td>{$row['jml']}</td>
                    <td>{$row['hrg']}</td>
                    <td>{$row['total']}</td>
                    <td>{$row['tgl_trs']}</td>
                    <td>{$row['nm_plg']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
    }
    ?>
</table>

<?php include('../partials/footer.php'); ?>
