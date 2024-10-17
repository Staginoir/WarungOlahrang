<?php include('../partials/header.php'); ?>
<?php include('../config/database.php'); ?>

<h2>View Menu Harga</h2>
<table border="1">
    <tr>
        <th>Kode Menu</th>
        <th>Nama Menu</th>
        <th>Harga Jual</th>
    </tr>
    <?php
    $sql = "SELECT * FROM v_menu_harga";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['kd_menu']}</td>
                    <td>{$row['nm_menu']}</td>
                    <td>{$row['hrg_jual']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
    }
    ?>
</table>

<?php include('../partials/footer.php'); ?>
