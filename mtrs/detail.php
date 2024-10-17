<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<?php
$no_trs = $_GET['no_trs'];
$sql = "SELECT * FROM trs WHERE no_trs = '$no_trs'";
$result = $conn->query($sql);
?>

<h2>Detail Transaksi</h2>
<a href="index.php">Kembali</a>
<table border="1">
    <tr>
        <th>No Transaksi</th>
        <th>Kode Menu</th>
        <th>Nama Menu</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Mendapatkan nama menu dari tabel menu
            $kd_menu = $row['kd_menu'];
            $menu_sql = "SELECT nm_menu FROM menu WHERE kd_menu = '$kd_menu'";
            $menu_result = $conn->query($menu_sql);
            $menu_row = $menu_result->fetch_assoc();
            $nm_menu = $menu_row['nm_menu'];

            echo "<tr>
                    <td>{$row['no_trs']}</td>
                    <td>{$row['kd_menu']}</td>
                    <td>{$nm_menu}</td>
                    <td>{$row['jml']}</td>
                    <td>{$row['hrg']}</td>
                    <td>{$row['total']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
    }
    ?>
</table>

<?php include('../partials/footer.php'); ?>
