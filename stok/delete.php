<?php
include('../config/database.php');

if (isset($_GET['kd_stok']) && !empty($_GET['kd_stok'])) {
    $sql_select = "SELECT gbr FROM stok WHERE kd_stok = ?";
    
    if ($stmt = $conn->prepare($sql_select)) {
        $stmt->bind_param("s", $param_kd_stok);
        $param_kd_stok = trim($_GET['kd_stok']);
        
        if ($stmt->execute()) {
            $stmt->store_result();
            
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($gbr);
                
                if ($stmt->fetch()) {
                    $sql_delete = "DELETE FROM stok WHERE kd_stok = ?";
                    
                    if ($stmt_delete = $conn->prepare($sql_delete)) {
                        $stmt_delete->bind_param("s", $param_kd_stok);
                        $param_kd_stok = trim($_GET['kd_stok']);
                        
                        if ($stmt_delete->execute()) {
                            if (!empty($gbr) && file_exists("../images/stok/" . $gbr)) {
                                unlink("../images/stok/" . $gbr);
                            }
                            
                            header("location: index.php");
                            exit();
                        } else {
                            echo "Terjadi kesalahan saat menghapus stok.";
                        }
                    }
                    
                    $stmt_delete->close();
                }
            } else {
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Terjadi kesalahan. Silakan coba lagi nanti.";
        }
    }
    
    $stmt->close();
    $conn->close();
} else {
    header("location: error.php");
    exit();
}
?>
