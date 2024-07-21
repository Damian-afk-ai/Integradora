<?php 
include '../connect.php';

$query = "INSERT INTO EMPLEADO (n1_emp, ap_emp, am_emp, puesto_emp) 
VALUES ('$_GET[n1_emp]', '$_GET[ap_emp]', '$_GET[am_emp]', '$_GET[puesto_emp]')";
$query_result = mysqli_query($conn, $query);

mysqli_close($conn);

header("Location: ../panel_control.php?page=empleado");
