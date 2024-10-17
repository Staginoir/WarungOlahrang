<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<div class="container">
    <h2>Daftar Menu</h2>
    <a href="insert.php">Tambah Menu</a>
    <table class="data-table">
        <tr>
            <th>Kode Menu</th>
            <th>Nama Menu</th>
            <th>Satuan</th>
            <th>Harga Jual</th>
            <th>Gambar</th>
            <th>Kode Stok</th> <!-- Tambah kolom Kode Stok -->
            <th>Aksi</th>
        </tr>
        <?php
        // Query untuk mengambil data dari tabel menu dan stok yang telah digabungkan
        $sql = "SELECT m.kd_menu, m.nm_menu, m.satuan, m.hrg_jual, m.gbr, m.kd_stok, s.kd_stok AS kd_stok_stok
                FROM menu m
                LEFT JOIN stok s ON m.kd_stok = s.kd_stok";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['kd_menu']}</td>
                        <td>{$row['nm_menu']}</td>
                        <td>{$row['satuan']}</td>
                        <td>{$row['hrg_jual']}</td>
                        <td><img src='../images/menu/{$row['gbr']}' alt='{$row['nm_menu']}' class='thumbnail'></td>
                        <td>{$row['kd_stok']}</td> <!-- Tampilkan kd_stok -->
                        <td>
                            <a href='update.php?kd_menu={$row['kd_menu']}'>Edit</a> |
                            <a href='delete.php?kd_menu={$row['kd_menu']}' onclick='return confirm(\"Apakah anda yakin ingin menghapus menu ini?\");'>Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</div>

<?php include('../partials/footer.php'); ?>
