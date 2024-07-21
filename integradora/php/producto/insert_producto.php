<?php 
include '../connect.php';

$query_pro = "INSERT INTO PRODUCTO (nom_pro, desa_pro, desc_pro, cost_pro, prec_pro, id_cat, est_pro) 
VALUES ('$_GET[nom_pro]', '$_GET[desa_pro]', '$_GET[desc_pro]', '$_GET[cost_pro]', '$_GET[prec_pro]', '$_GET[id_cat]', '$_GET[est_pro]')";

$query_result = mysqli_query($conn, $query_pro);

mysqli_close($conn);

header("Location: ../panel_control.php?page=producto");
