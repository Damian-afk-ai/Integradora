<?php
require_once '../funciones.php';
$conn = connectDatabase();

$query = "UPDATE USUARIO 
          SET est_usu = 2 
          WHERE id_usu = $_GET[id_usu]";

$query_result = mysqli_query($conn, $query);

mysqli_close($conn);

header("Location: ../panel_control.php?page=usuario");
?>