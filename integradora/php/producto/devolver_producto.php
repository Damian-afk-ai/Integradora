<?php
include '../connect.php';

$query_pro = "UPDATE PRODUCTO 
          SET est_pro = 1 
          WHERE id_pro = $_GET[id_pro]";

$query_result = mysqli_query($conn, $query_pro);

mysqli_close($conn);

header("Location: ../panel_control.php?page=producto");
?>
