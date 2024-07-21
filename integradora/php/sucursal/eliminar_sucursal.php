<?php
include '../connect.php';

$query_pro = "UPDATE SUCURSAL 
          SET est_suc = 2 
          WHERE id_suc = $_GET[id_suc]";

$query_result = mysqli_query($conn, $query_pro);

mysqli_close($conn);

header("Location: ../panel_control.php?page=sucursal");
?>