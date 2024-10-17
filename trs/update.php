<?php
include('../partials/header.php');
include('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission and update process here
    if (isset($_POST['no'])) {
        $no = $_POST['no'];
        $no_faktur = $_POST['no_faktur'];
        $tanggal_faktur = $_POST['tanggal_faktur'];
        $total_barang_jasa = $_POST['total_barang_jasa'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $total = $_POST['total'];

        $sql = "UPDATE Faktur 
                SET NO_FAKTUR = ?, TANGGAL_FAKTUR = ?, TOTAL_BARANG_JASA = ?, NAMA = ?, HARGA = ?, TOTAL = ?
                WHERE NO = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssisidi', $no_faktur, $tanggal_faktur, $total_barang_jasa, $nama, $harga, $total, $no);

        if ($stmt->execute()) {
            echo "Faktur berhasil diupdate.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }
    
    $conn->close();
    include('../partials/footer.php');
    exit(); // Exit after processing POST request
}

// Continue with the original update.php content to display the form
if (isset($_GET['no'])) {
    $no = $_GET['no'];
    $sql = "SELECT * FROM Faktur WHERE NO = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $no);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if (!$row) {
        echo "Faktur tidak ditemukan.";
        exit();
    }
} else {
    echo "No faktur tidak diberikan.";
    exit();
}
?>

<div class="container">
    <h2>Update Faktur</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="hidden" name="no" value="<?php echo $row['no']; ?>">
        <label for="NO_faktur">No Faktur:</label>
        <input type="text" id="NO_faktur" name="no_faktur" value="<?php echo $row['NO_FAKTUR']; ?>" required><br><br>
        <label for="tanggal_faktur">Tanggal Faktur:</label>
        <input type="date" id="tanggal_faktur" name="tanggal_faktur" value="<?php echo $row['TANGGAL_FAKTUR']; ?>" required><br><br>
        <label for="total_barang_jasa">Total Barang/Jasa:</label>
        <input type="number" id="total_barang_jasa" name="total_barang_jasa" value="<?php echo $row['TOTAL_BARANG_JASA']; ?>" required><br><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['NAMA']; ?>" required><br><br>
        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" value="<?php echo $row['HARGA']; ?>" required><br><br>
        <label for="total">Total:</label>
        <input type="number" id="total" name="total" value="<?php echo $row['TOTAL']; ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
</div>

<?php
$stmt->close();
$conn->close();
include('../partials/footer.php');
?>
