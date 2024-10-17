<?php include('../partials/header.php'); ?>
<?php
require_once '../config/database.php'; // Pastikan ini sesuai dengan nama file yang sesuai dengan konfigurasi database Anda

if (!isset($_GET['no_trs']) || empty($_GET['no_trs'])) {
    die("ID Transaksi tidak tersedia.");
}

$no_trs = $_GET['no_trs'];

// Koneksi ke database (jika belum terkoneksi)
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Query untuk mengambil informasi transaksi dari database
$query_mtrs = "SELECT mtrs.*, karyawan.nm_kyw 
               FROM mtrs 
               LEFT JOIN karyawan ON mtrs.kd_kyw = karyawan.kd_kyw 
               WHERE mtrs.no_trs = '$no_trs'";
$result_mtrs = mysqli_query($conn, $query_mtrs);

if (!$result_mtrs) {
    die("Query gagal: " . mysqli_error($conn));
}

$mtrs = mysqli_fetch_assoc($result_mtrs);

// Query untuk mengambil detail transaksi
$query_trs = "SELECT trs.*, menu.nm_menu 
              FROM trs 
              JOIN menu ON trs.kd_menu = menu.kd_menu 
              WHERE trs.no_trs = '$no_trs'";
$result_trs = mysqli_query($conn, $query_trs);

if (!$result_trs) {
    die("Query gagal: " . mysqli_error($conn));
}

$items = [];
while ($row = mysqli_fetch_assoc($result_trs)) {
    $items[] = $row;
}

// Query untuk mengambil informasi header kafe dari tabel 'header'
$query_header = "SELECT * FROM header LIMIT 1"; // Ambil satu baris pertama saja
$result_header = mysqli_query($conn, $query_header);

if (!$result_header) {
    die("Query gagal: " . mysqli_error($conn));
}

$header_info = mysqli_fetch_assoc($result_header);

// Membuat struk dalam format HTML
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Transaksi</title>
    <style>
        /* Gaya CSS untuk struk */
        body { font-family: Arial, sans-serif; }
        .receipt { width: 300px; margin: auto; padding: 20px; border: 1px solid #000; }
        .receipt h2 { text-align: center; }
        .receipt table { width: 100%; border-collapse: collapse; }
        .receipt table th, .receipt table td { border: 1px solid #000; padding: 5px; text-align: left; }
        .receipt table th { background-color: #f2f2f2; }
        .total { text-align: right; }
    </style>
</head>
<body>
    <div class="receipt">
        <h2>Struk Transaksi</h2>
        <p><?php echo htmlspecialchars($header_info['nm_cafe']); ?></p>
        <p><?php echo htmlspecialchars($header_info['almt']); ?></p>
        <p><?php echo htmlspecialchars($header_info['kota']); ?></p>
        <hr>
        <p>ID Transaksi: <?php echo htmlspecialchars($mtrs['no_trs']); ?></p>
        <p>Tanggal: <?php echo htmlspecialchars($mtrs['tgl_trs']); ?></p>
        <p>Kasir: <?php echo htmlspecialchars($mtrs['nm_kyw']); ?></p>
        <p>Pelanggan: <?php echo htmlspecialchars($mtrs['nm_plg']); ?></p>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['nm_menu']); ?></td>
                    <td><?php echo htmlspecialchars($item['jml']); ?></td>
                    <td><?php echo number_format($item['hrg'], 2); ?></td>
                    <td><?php echo number_format($item['jml'] * $item['hrg'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="total"><strong>Total: Rp <?php echo number_format($mtrs['total'], 2); ?></strong></p>
    </div>
</body>
</html>
<?php include('../partials/footer.php'); ?>
