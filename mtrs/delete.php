<?php
include('../config/database.php');

if (isset($_GET['no_trs'])) {
    $no_trs = $_GET['no_trs'];

    // Mulai transaksi
    $conn->begin_transaction();

    try {
        // Hapus data dari tabel anak (trs) terlebih dahulu
        $sql_delete_trs = "DELETE FROM trs WHERE no_trs = ?";
        $stmt_trs = $conn->prepare($sql_delete_trs);
        $stmt_trs->bind_param('s', $no_trs);
        $stmt_trs->execute();

        // Setelah itu, hapus data dari tabel utama (mtrs)
        $sql_delete_mtrs = "DELETE FROM mtrs WHERE no_trs = ?";
        $stmt_mtrs = $conn->prepare($sql_delete_mtrs);
        $stmt_mtrs->bind_param('s', $no_trs);
        $stmt_mtrs->execute();

        // Commit transaksi
        $conn->commit();

        // Setelah berhasil, arahkan ke halaman index.php di direktori mtrs dengan parameter success
        header("Location: http://localhost/warungolahrahang/mtrs/index.php?success=1");
        exit(); // Pastikan skrip berhenti setelah redirect
    } catch (mysqli_sql_exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    // Tutup statement
    $stmt_trs->close();
    $stmt_mtrs->close();
}

$conn->close();
?>
