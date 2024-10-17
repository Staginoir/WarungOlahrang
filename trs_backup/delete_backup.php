<?php
include('../config/database.php');

if (isset($_GET['no_trs'])) {
    $no_trs = $_GET['no_trs'];

    try {
        // Query untuk menghapus data dari tabel trs_backup berdasarkan no_trs
        $sql_delete_trs_backup = "DELETE FROM trs_backup WHERE no_trs = ?";
        $stmt1 = $conn->prepare($sql_delete_trs_backup);
        $stmt1->bind_param("s", $no_trs);
        $stmt1->execute();
        $stmt1->close();

        // Query untuk menghapus data dari tabel mtrs_backup berdasarkan no_trs
        $sql_delete_mtrs_backup = "DELETE FROM mtrs_backup WHERE no_trs = ?";
        $stmt2 = $conn->prepare($sql_delete_mtrs_backup);
        $stmt2->bind_param("s", $no_trs);
        $stmt2->execute();
        $stmt2->close();

        header("Location: http://localhost/warungolahrahang/trs_backup/index.php"); // Redirect kembali ke halaman index setelah penghapusan berhasil
        exit();
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn->close();
?>
