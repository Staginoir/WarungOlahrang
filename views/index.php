<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar View</title>
    <!-- Bootstrap CSS link (adjust as needed) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Daftar View</h2>
    <div class="mb-3">
        <a href="../views/v_menu_harga.php" class="btn btn-primary me-2">View Menu Harga</a>
        <a href="../views/v_penjualan_harian.php" class="btn btn-primary me-2">View Penjualan Harian</a>
        <a href="../views/v_stok_bahan.php" class="btn btn-primary me-2">View Stok Bahan</a>
        <a href="../views/v_transaksi.php" class="btn btn-primary">View Transaksi</a>
    </div>

    <!-- View Menu Harga -->
    <?php
    $sql = "SELECT * FROM v_menu_harga";
    $result = $conn->query($sql);
    ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">View Menu Harga</h3>
        </div>
        <div class="card-body">
            <?php if ($result->num_rows > 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Menu</th>
                            <th>Nama Menu</th>
                            <th>Harga Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['kd_menu']; ?></td>
                                <td><?php echo $row['nm_menu']; ?></td>
                                <td><?php echo number_format($row['hrg_jual'], 0, ',', '.'); ?></td> <!-- Format harga -->
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-muted">Tidak ada data</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- View Penjualan Harian -->
    <?php
    $sql = "SELECT * FROM v_penjualan_harian";
    $result = $conn->query($sql);
    ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">View Penjualan Harian</h3>
        </div>
        <div class="card-body">
            <?php if ($result->num_rows > 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>Total Penjualan</th>
                            <th>Total Item Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['tgl_trs']; ?></td>
                                <td>Rp <?php echo number_format($row['total_penjualan'], 0, ',', '.'); ?></td> <!-- Format Rupiah -->
                                <td><?php echo $row['total_item_terjual']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-muted">Tidak ada data</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- View Stok Bahan -->
    <?php
    $sql = "SELECT * FROM v_stok_bahan";
    $result = $conn->query($sql);
    ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">View Stok Bahan</h3>
        </div>
        <div class="card-body">
            <?php if ($result->num_rows > 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Stok</th>
                            <th>Nama Stok</th>
                            <th>Jumlah Stok</th>
                            <th>Nama Bahan</th>
                            <th>Satuan Bahan</th>
                            <th>Jumlah Bahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['kd_stok']; ?></td>
                                <td><?php echo $row['nm_stok']; ?></td>
                                <td><?php echo $row['jml_stok']; ?></td>
                                <td><?php echo $row['nm_bhn']; ?></td>
                                <td><?php echo $row['satuan_bhn']; ?></td>
                                <td><?php echo $row['jml_bhn']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-muted">Tidak ada data</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- View Transaksi -->
    <?php
    $sql = "SELECT * FROM v_transaksi";
    $result = $conn->query($sql);
    ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">View Transaksi</h3>
        </div>
        <div class="card-body">
            <?php if ($result->num_rows > 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No Transaksi</th>
                            <th>Kode Menu</th>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Pelanggan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['no_trs']; ?></td>
                                <td><?php echo $row['kd_menu']; ?></td>
                                <td><?php echo $row['nm_menu']; ?></td>
                                <td><?php echo $row['jml']; ?></td>
                                <td>Rp <?php echo number_format($row['hrg'], 0, ',', '.'); ?></td> <!-- Format Rupiah -->
                                <td>Rp <?php echo number_format($row['total'], 0, ',', '.'); ?></td> <!-- Format Rupiah -->
                                <td><?php echo $row['tgl_trs']; ?></td>
                                <td><?php echo $row['nm_plg']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-muted">Tidak ada data</p>
            <?php endif; ?>
        </div>
    </div>

</div>

<?php include('../partials/footer.php'); ?>

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
