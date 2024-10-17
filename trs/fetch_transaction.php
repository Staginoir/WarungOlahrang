<?php
include '../config/db.php'; // Memasukkan konfigurasi database

$no_trs = $_GET['no_trs']; // Mendapatkan ID transaksi dari parameter URL

// Mengambil detail transaksi master
$query_mtrs = "SELECT * FROM mtrs WHERE no_trs = '$no_trs'";
$result_mtrs = mysqli_query($conn, $query_mtrs);
$mtrs = mysqli_fetch_assoc($result_mtrs);

// Mengambil detail transaksi
$query_trs = "SELECT trs.*, menu.nm_menu 
              FROM trs 
              JOIN menu ON trs.kd_menu = menu.kd_menu 
              WHERE trs.no_trs = '$no_trs'";
$result_trs = mysqli_query($conn, $query_trs);

$items = [];
while ($row = mysqli_fetch_assoc($result_trs)) {
    $items[] = $row;
}

// Output sebagai JSON untuk pemrosesan lebih lanjut
header('Content-Type: application/json');
echo json_encode([
    'mtrs' => $mtrs,
    'items' => $items
]);
?>
