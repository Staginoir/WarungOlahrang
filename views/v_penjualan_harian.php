<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>View Penjualan Harian</h2>
<table border="1">
    <tr>
        <th>Tanggal Transaksi</th>
        <th>Total Penjualan</th>
        <th>Total Item Terjual</th>
    </tr>
    <?php
    $sql = "SELECT * FROM v_penjualan_harian";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['tgl_trs']}</td>
                    <td>{$row['total_penjualan']}</td>
                    <td>{$row['total_item_terjual']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
    }
    ?>
</table>

<?php include('../partials/footer.php'); ?>
