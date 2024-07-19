<?php
include '../connect.php';

$query_pro = "UPDATE INVENTARIO 
          SET cant_inv = 0 
          WHERE id_inv = $_GET[id_inv]";

$query_result = mysqli_query($conn,$query_pro);

mysqli_close($conn);

header("Location: ../panel_control.php?page=inventario");
?>