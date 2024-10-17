<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>Tambah Transaksi</h2>
<form action="" method="post">
    <label for="no_trs">No Transaksi:</label><br>
    <input type="text" id="no_trs" name="no_trs" required><br>
    <label for="tgl_trs">Tanggal Transaksi:</label><br>
    <input type="date" id="tgl_trs" name="tgl_trs" required><br>
    <label for="kd_kyw">Kode Karyawan:</label><br>
    <select id="kd_kyw" name="kd_kyw" required>
        <option value="">Pilih Kode Karyawan</option>
        <?php
        $sql = "SELECT kd_kyw, nm_kyw FROM karyawan";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            echo "<option value='{$row['kd_kyw']}'>{$row['nm_kyw']}</option>";
        }
        ?>
    </select><br>
    <label for="nm_plg">Nama Pelanggan:</label><br>
    <input type="text" id="nm_plg" name="nm_plg" required><br>
    <h3>Detail Transaksi</h3>
    <table id="trsTable">
        <tr>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </table>
    <button type="button" onclick="addRow()">Tambah Menu</button><br><br>
    <input type="submit" name="submit" value="Tambah Transaksi">
</form>

<script>
function addRow() {
    var table = document.getElementById('trsTable');
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);

    cell1.innerHTML = `<select name="kd_menu[]" required onchange="updateStock(this)">
                          <option value="">Pilih Menu</option>
                          <?php
                          $sql = "SELECT m.kd_menu, m.nm_menu, m.hrg_jual, s.jml_stok 
                                  FROM menu m
                                  LEFT JOIN stok s ON m.kd_stok = s.kd_stok";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {
                                  echo "<option value='{$row['kd_menu']}' data-harga='{$row['hrg_jual']}' data-stok='{$row['jml_stok']}'>{$row['nm_menu']} (Stok: {$row['jml_stok']})</option>";
                              }
                          } else {
                              echo "<option value=''>Data menu tidak ditemukan</option>";
                          }
                          ?>
                       </select>`;
    cell2.innerHTML = '<input type="number" name="jumlah[]" min="1" required onchange="updateTotal(this)">';
    cell3.innerHTML = '<input type="text" name="harga[]" readonly>';
    cell4.innerHTML = '<input type="text" name="total[]" readonly>';
    cell5.innerHTML = '<button type="button" onclick="deleteRow(this)">Hapus</button>';
}

function deleteRow(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function updateStock(select) {
    var selectedOption = select.options[select.selectedIndex];
    var stock = selectedOption.getAttribute('data-stok');
    var row = select.parentNode.parentNode;
    var jumlahInput = row.querySelector('input[name="jumlah[]"]');

    // Set max value based on stock
    jumlahInput.max = stock;

    // Update price based on the selected menu
    var harga = selectedOption.getAttribute('data-harga');
    row.querySelector('input[name="harga[]"]').value = harga;

    // Reset jumlah and total if menu is changed
    jumlahInput.value = '';
    row.querySelector('input[name="total[]"]').value = '';

    // Call updateTotal to ensure validation is updated
    updateTotal(jumlahInput);
}

function updateTotal(input) {
    var row = input.parentNode.parentNode;
    var harga = row.querySelector('input[name="harga[]"]').value;
    var jumlah = input.value;
    var maxStok = input.max;

    // Check if jumlah melebihi stok yang tersedia
    if (parseInt(jumlah) > parseInt(maxStok)) {
        alert("Jumlah melebihi stok yang tersedia. Stok maksimum: " + maxStok);
        input.value = ''; // Reset input jumlah
        row.querySelector('input[name="total[]"]').value = ''; // Reset total
        return; // Exit the function early
    }

    var total = harga * jumlah;
    row.querySelector('input[name="total[]"]').value = total;
}
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_trs = $_POST['no_trs'];
    $tgl_trs = $_POST['tgl_trs'];
    $kd_kyw = $_POST['kd_kyw'];
    $nm_plg = $_POST['nm_plg'];
    $kd_menu_array = $_POST['kd_menu'];
    $jumlah_array = $_POST['jumlah'];
    $total_trs = 0;

    // Insert into mtrs
    $sql_mtrs = "INSERT INTO mtrs (no_trs, tgl_trs, kd_kyw, nm_plg) VALUES ('$no_trs', '$tgl_trs', '$kd_kyw', '$nm_plg')";
    if ($conn->query($sql_mtrs) === TRUE) {
        for ($i = 0; $i < count($kd_menu_array); $i++) {
            $kd_menu = $kd_menu_array[$i];
            $jumlah = $jumlah_array[$i];
            $hrg = $conn->query("SELECT hrg_jual FROM menu WHERE kd_menu = '$kd_menu'")->fetch_assoc()['hrg_jual'];
            $total = $hrg * $jumlah;
            $total_trs += $total;

            // Insert into trs
            $sql_trs = "INSERT INTO trs (no_trs, kd_menu, jml, hrg, total) VALUES ('$no_trs', '$kd_menu', $jumlah, $hrg, $total)";
            $conn->query($sql_trs);

            // Update stok di tabel stok
            $sql_update_stok = "UPDATE stok SET jml_stok = jml_stok - $jumlah WHERE kd_stok = '$kd_menu'";
            if ($conn->query($sql_update_stok) === TRUE) {
                echo "Stok berhasil diperbarui untuk menu dengan kode $kd_menu.<br>";
            } else {
                echo "Error updating stok: " . $conn->error . "<br>";
            }
        }

        // Update total transaksi di tabel mtrs
        $sql_update_total = "UPDATE mtrs SET total = $total_trs WHERE no_trs = '$no_trs'";
        $conn->query($sql_update_total);

        echo "Transaksi berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql_mtrs . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<?php include('../partials/footer.php'); ?>
