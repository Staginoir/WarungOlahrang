<?php
// Include header and database connection
include('../partials/header.php');
include('../config/database.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $kd_stok = $_POST['kd_stok'];
    $nm_stok = $_POST['nm_stok'];
    $satuan = $_POST['satuan'];
    $jml_stok = $_POST['jml_stok'];
    $hrg_beli = $_POST['hrg_beli'];
    $kd_bhn = $_POST['kd_bhn'];

    // File upload handling
    $gbr = $_FILES['gbr']['name'];
    $target_dir = "../images/stok/";
    $target_file = $target_dir . basename($gbr);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['gbr']['tmp_name']);
    if ($check !== false) {
        echo "File is an image - " . $check['mime'] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES['gbr']['size'] > 500000) { // 500KB max size
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES['gbr']['tmp_name'], $target_file)) {
            echo "The file " . htmlspecialchars(basename($gbr)) . " has been uploaded.";

            // SQL query to insert data
            $sql = "INSERT INTO stok (kd_stok, nm_stok, satuan, jml_stok, hrg_beli, gbr, kd_bhn) 
                    VALUES ('$kd_stok', '$nm_stok', '$satuan', $jml_stok, $hrg_beli, '$gbr', '$kd_bhn')";

            // Perform the insertion and handle errors
            if ($conn->query($sql) === TRUE) {
                echo "Stok berhasil ditambahkan.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Close database connection
    $conn->close();
}
?>

<!-- HTML form for inserting data -->
<h2>Tambah Stok</h2>
<form action="" method="post" enctype="multipart/form-data">
    <label for="kd_stok">Kode Stok:</label><br>
    <input type="text" id="kd_stok" name="kd_stok" required><br>
    <label for="nm_stok">Nama Stok:</label><br>
    <input type="text" id="nm_stok" name="nm_stok" required><br>
    <label for="satuan">Satuan:</label><br>
    <input type="text" id="satuan" name="satuan" required><br>
    <label for="jml_stok">Jumlah Stok:</label><br>
    <input type="number" id="jml_stok" name="jml_stok" required><br>
    <label for="hrg_beli">Harga Beli:</label><br>
    <input type="number" id="hrg_beli" name="hrg_beli" required><br>
    <label for="kd_bhn">Kode Bahan:</label><br>
    <input type="text" id="kd_bhn" name="kd_bhn" required><br>
    <label for="gbr">Gambar:</label><br>
    <input type="file" id="gbr" name="gbr" required><br><br>
    <input type="submit" name="submit" value="Tambah">
</form>

<?php include('../partials/footer.php'); ?>
