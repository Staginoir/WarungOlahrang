<?php include('partials/header.php'); ?>
<?php include('config/database.php'); ?>

<div class="container">
    <h1 class="main-title">Selamat Datang di Sistem Informasi Warung Olahrahang</h1>

    <div class="section">
        <h2 class="section-title">Menu Terbaru</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Kode Menu</th>
                    <th>Nama Menu</th>
                    <th>Harga Jual</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT kd_menu, nm_menu, hrg_jual, gbr FROM menu ORDER BY kd_menu DESC LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $imagePath = $row['gbr'] ? "images/menu/{$row['gbr']}" : "images/no_image.png";
                        echo "<tr>
                                <td>{$row['kd_menu']}</td>
                                <td>{$row['nm_menu']}</td>
                                <td>Rp. " . number_format($row['hrg_jual'], 0, ',', '.') . "</td>
                                <td><img src='$imagePath' alt='{$row['nm_menu']}' class='thumbnail'></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="section">
        <h2 class="section-title">Stok Terkini</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Kode Stok</th>
                    <th>Nama Stok</th>
                    <th>Jumlah</th>
                    <th>Harga Beli</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT kd_stok, nm_stok, jml_stok, hrg_beli, gbr FROM stok ORDER BY kd_stok DESC LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $imagePath = $row['gbr'] ? "images/stok/{$row['gbr']}" : "images/no_image.png";
                        echo "<tr>
                                <td>{$row['kd_stok']}</td>
                                <td>{$row['nm_stok']}</td>
                                <td>{$row['jml_stok']}</td>
                                <td>Rp. " . number_format($row['hrg_beli'], 0, ',', '.') . "</td>
                                <td><img src='$imagePath' alt='{$row['nm_stok']}' class='thumbnail'></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="section">
        <h2 class="section-title">Daftar Bahan Terkini</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Kode Bahan</th>
                    <th>Nama Bahan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT kd_bhn, nm_bhn, jml_bhn, hrg_bhn FROM bahan ORDER BY kd_bhn DESC LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['kd_bhn']}</td>
                                <td>{$row['nm_bhn']}</td>
                                <td>{$row['jml_bhn']}</td>
                                <td>Rp. " . number_format($row['hrg_bhn'], 0, ',', '.') . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="section">
        <h2 class="section-title">Daftar Karyawan</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Kode Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT kd_kyw, nm_kyw, almt, telp, jns_kel FROM karyawan ORDER BY kd_kyw DESC LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['kd_kyw']}</td>
                                <td>{$row['nm_kyw']}</td>
                                <td>{$row['almt']}</td>
                                <td>{$row['telp']}</td>
                                <td>{$row['jns_kel']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>
