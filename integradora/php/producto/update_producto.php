<?php
include '../connect.php';

$id = $_GET['id_pro'];

$query_pro = "UPDATE PRODUCTO 
                SET nom_pro = ?, 
                desa_pro = ?, 
                desc_pro = ?, 
                cost_pro = ?, 
                prec_pro = ?, 
                id_cat = ? 
            WHERE id_pro = ?";

$stmt = mysqli_prepare($conn, $query_pro);

mysqli_stmt_bind_param($stmt, 'ssssssi', 
    $_GET['nom_pro'], 
    $_GET['desa_pro'], 
    $_GET['desc_pro'], 
    $_GET['cost_pro'], 
    $_GET['prec_pro'], 
    $_GET['id_cat'], 
    $id
);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

mysqli_close($conn);

header("Location: ../panel_control.php?page=producto");
exit();
?>