<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>View Stok Bahan</h2>
<table border="1">
    <tr>
        <th>Kode Stok</th>
        <th>Nama Stok</th>
        <th>Jumlah Stok</th>
        <th>Nama Bahan</th>
        <th>Satuan Bahan</th>
        <th>Jumlah Bahan</th>
    </tr>
    <?php
    $sql = "SELECT * FROM v_stok_bahan";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['kd_stok']}</td>
                    <td>{$row['nm_stok']}</td>
                    <td>{$row['jml_stok']}</td>
                    <td>{$row['nm_bhn']}</td>
                    <td>{$row['satuan_bhn']}</td>;
                    <td>{$row['jml_bhn']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
    }
    ?>
</table>

<?php include('../partials/footer.php'); ?>
