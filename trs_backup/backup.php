<?php include('../partials/header.php'); ?>
<?php
include('../config/database.php');

// Backup data dari tabel mtrs ke mtrs_backup
$sql_backup_mtrs = "INSERT INTO mtrs_backup (no_trs, tgl_trs, kd_kyw, nm_plg) SELECT no_trs, tgl_trs, kd_kyw, nm_plg FROM mtrs";
if ($conn->query($sql_backup_mtrs) === TRUE) {
    echo "Backup data mtrs berhasil.";
} else {
    echo "Error: " . $sql_backup_mtrs . "<br>" . $conn->error;
}

// Backup data dari tabel trs ke trs_backup
$sql_backup_trs = "INSERT INTO trs_backup (no_trs, kd_menu, jml, hrg, total) SELECT no_trs, kd_menu, jml, hrg, total FROM trs";
if ($conn->query($sql_backup_trs) === TRUE) {
    echo "Backup data trs berhasil.";
} else {
    echo "Error: " . $sql_backup_trs . "<br>" . $conn->error;
}

$conn->close();
?>
<?php include('../partials/footer.php'); ?>