<?php 
require_once '../funciones.php';
$conn = connectDatabase();

$query = "INSERT INTO USUARIO (nom_usu, correo_usu, contra_usu, est_usu, pri_usu, edad_usu, fech_usu, ciudad_usu) 
VALUES ('$_GET[nom_usu]', '$_GET[correo_usu]', '$_GET[contra_usu]', '$_GET[est_usu]', '$_GET[pri_usu]', '$_GET[edad_usu]', '$_GET[fech_usu]', '$_GET[ciudad_usu]')";
$query_result = mysqli_query($conn, $query);

mysqli_close($conn);

header("Location: ../panel_control.php?page=usuario");