<?php
include '../connect.php';

$id = $_GET['id_inv'];

$query_pro = "UPDATE INVENTARIO 
                SET id_suc = ?, 
                cant_inv = ?
            WHERE id_inv = ?";

$stmt = mysqli_prepare($conn, $query_pro);

mysqli_stmt_bind_param($stmt, 'ssi', 
    $_GET['id_suc'], 
    $_GET['cant_inv'],
    $id
);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

mysqli_close($conn);

header("Location: ../panel_control.php?page=inventario");
exit();
?>