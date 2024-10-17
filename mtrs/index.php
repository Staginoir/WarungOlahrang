<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<?php
// Cek apakah ada parameter 'success' di URL
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<p style='color: green;'>Data transaksi berhasil dihapus.</p>";
}
?>

<h2>Daftar Master Transaksi</h2>
<a href="insert.php">Tambah Master Transaksi</a>
<table class="data-table">
    <tr>
        <th>No Transaksi</th>
        <th>Tanggal Transaksi</th>
        <th>Nama Karyawan</th>
        <th>Nama Pelanggan</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>
    <?php
    // Perbarui query SQL untuk join dengan tabel karyawan
    $sql = "SELECT mtrs.*, karyawan.nm_kyw 
            FROM mtrs 
            LEFT JOIN karyawan ON mtrs.kd_kyw = karyawan.kd_kyw";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['no_trs']}</td>
                    <td>{$row['tgl_trs']}</td>
                    <td>{$row['nm_kyw']}</td>
                    <td>{$row['nm_plg']}</td>
                    <td>{$row['total']}</td>
                    <td>
                        <a href='update.php?no_trs={$row['no_trs']}'>Edit</a> |
                        <a href='delete.php?no_trs={$row['no_trs']}' onclick='return confirm(\"Apakah anda yakin ingin menghapus transaksi ini?\");'>Hapus</a> |
                        <a href='detail.php?no_trs={$row['no_trs']}'>Detail</a> |
                        <a href='../trs/generate_receipt.php?no_trs={$row['no_trs']}'>Buat Struk</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
    }
    ?>
</table>

<?php include('../partials/footer.php'); ?>
