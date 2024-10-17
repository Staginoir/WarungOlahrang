<?php
include('../config/database.php');

// Cetak URL untuk debugging
echo "URL: " . $_SERVER['REQUEST_URI'] . "<br>";

// Periksa apakah parameter 'kd_kyw' ada dalam query string URL
if (isset($_GET['kd_kyw'])) {
    $kd_kyw = $_GET['kd_kyw']; // Ambil parameter 'kd_kyw' dari URL

    // Gunakan 'kd_kyw' sebagai nama kolom yang benar dalam query SQL
    $sql = "DELETE FROM karyawan WHERE kd_kyw = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $kd_kyw);

    if ($stmt->execute()) {
        // Set pesan sukses di URL
        header("Location: index.php?success=1&message=Data berhasil dihapus.");
        exit();
    } else {
        // Tampilkan pesan kesalahan
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Tampilkan pesan jika 'kd_kyw' tidak ada di URL
    echo "Error: Parameter 'kd_kyw' tidak ditemukan.";
}

$conn->close();
?>
