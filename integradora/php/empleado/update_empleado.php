<?php
include '../connect.php';

$id = $_GET['id_emp'];

$query_pro = "UPDATE EMPLEADO 
                SET n1_emp = ?, 
                ap_emp = ?, 
                am_emp = ?, 
                puesto_emp = ? 
            WHERE id_emp = ?";

$stmt = mysqli_prepare($conn, $query_pro);

mysqli_stmt_bind_param($stmt, 'ssssi', 
    $_GET['n1_emp'], 
    $_GET['ap_emp'], 
    $_GET['am_emp'], 
    $_GET['puesto_emp'],
    $id
);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

mysqli_close($conn);

header("Location: ../panel_control.php?page=empleado");
exit();
?>
