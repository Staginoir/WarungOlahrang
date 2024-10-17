<?php
// Include header and database connection
include('../partials/header.php');
include('../config/database.php');

// Ambil kode stok dari parameter GET
$kd_stok = $_GET['kd_stok'];

// Query untuk mengambil data stok yang akan diedit
$sql = "SELECT * FROM stok WHERE kd_stok='$kd_stok'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Stok tidak ditemukan.";
    exit();
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nm_stok = $_POST['nm_stok'];
    $satuan = $_POST['satuan'];
    $jml_stok = $_POST['jml_stok'];
    $hrg_beli = $_POST['hrg_beli'];
    $kd_bhn = $_POST['kd_bhn'];

    // File upload handling (if any)
    if ($_FILES['gbr']['size'] > 0) {
        $gbr = $_FILES['gbr']['name'];
        $target_dir = "../images/stok/";
        $target_file = $target_dir . basename($gbr);

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES['gbr']['tmp_name']);
        if($check !== false) {
            if (move_uploaded_file($_FILES['gbr']['tmp_name'], $target_file)) {
                // SQL query untuk update data stok dengan gambar baru
                $sql = "UPDATE stok SET nm_stok='$nm_stok', satuan='$satuan', jml_stok=$jml_stok, hrg_beli=$hrg_beli, gbr='$gbr', kd_bhn='$kd_bhn' WHERE kd_stok='$kd_stok'";
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit();
            }
        } else {
            echo "File is not an image.";
            exit();
        }
    } else {
        // SQL query untuk update data stok tanpa gambar baru
        $sql = "UPDATE stok SET nm_stok='$nm_stok', satuan='$satuan', jml_stok=$jml_stok, hrg_beli=$hrg_beli, kd_bhn='$kd_bhn' WHERE kd_stok='$kd_stok'";
    }

    // Perform the update and handle errors
    if ($conn->query($sql) === TRUE) {
        echo "Stok berhasil diupdate.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>

<!-- HTML form untuk edit stok -->
<main class="container">
    <section class="section">
        <h2 class="section-title">Edit Stok</h2>
        <form action="" method="post" enctype="multipart/form-data" class="update-form">
            <div class="form-group">
                <label for="nm_stok">Nama Stok:</label><br>
                <input type="text" id="nm_stok" name="nm_stok" value="<?php echo $row['nm_stok']; ?>" required><br>
            </div>
            <div class="form-group">
                <label for="satuan">Satuan:</label><br>
                <input type="text" id="satuan" name="satuan" value="<?php echo $row['satuan']; ?>" required><br>
            </div>
            <div class="form-group">
                <label for="jml_stok">Jumlah Stok:</label><br>
                <input type="number" id="jml_stok" name="jml_stok" value="<?php echo $row['jml_stok']; ?>" required><br>
            </div>
            <div class="form-group">
                <label for="hrg_beli">Harga Beli:</label><br>
                <input type="number" id="hrg_beli" name="hrg_beli" value="<?php echo $row['hrg_beli']; ?>" required><br>
            </div>
            <div class="form-group">
                <label for="kd_bhn">Kode Bahan:</label><br>
                <input type="text" id="kd_bhn" name="kd_bhn" value="<?php echo $row['kd_bhn']; ?>" required><br>
            </div>
            <div class="form-group">
                <label for="gbr">Gambar Stok:</label><br>
                <?php if (!empty($row['gbr'])): ?>
                    <img src="../images/stok/<?php echo $row['gbr']; ?>" alt="<?php echo $row['nm_stok']; ?>" class="thumbnail"><br>
                <?php else: ?>
                    <p>No image available</p>
                <?php endif; ?>
                <input type="file" id="gbr" name="gbr"><br>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Update" class="submit-button">
            </div>
        </form>
    </section>
</main>

<?php include('../partials/footer.php'); ?>
