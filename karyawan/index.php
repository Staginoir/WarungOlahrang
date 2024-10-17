<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<div class="container">
    <h2>Daftar Karyawan</h2>
    <a href="insert.php">Tambah Karyawan</a>
    <table class="data-table">
        <tr>
            <th>Kode Karyawan</th>
            <th>Nama Karyawan</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT * FROM karyawan";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['kd_kyw']}</td>
                        <td>{$row['nm_kyw']}</td>
                        <td>{$row['almt']}</td>
                        <td>{$row['telp']}</td>
                        <td>{$row['jns_kel']}</td>
                        <td>
                            <a href='update.php?kd_kyw={$row['kd_kyw']}'>Edit</a> |
                            <a href='delete.php?kd_kyw={$row['kd_kyw']}' onclick='return confirm(\"Apakah anda yakin ingin menghapus karyawan ini?\");'>Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</div>

<?php include('../partials/footer.php'); ?>
