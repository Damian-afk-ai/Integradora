<?php
require_once '../funciones.php';
$conn = connectDatabase();

$id = $_GET['id_usu'];

$query = "UPDATE USUARIO 
          SET nom_usu = ?, 
              correo_usu = ?, 
              contra_usu = ?,
              edad_usu = ?,
              fech_usu = ?,
              ciudad_usu = ?,
              est_usu = ?,
              pri_usu = ? 
          WHERE id_usu = ?";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, 'ssssssssi', 
    $_GET['nom_usu'], 
    $_GET['correo_usu'],
    $_GET['edad_usu'],
    $_GET['fech_usu'],
    $_GET['eciudad_usu'], 
    $_GET['contra_usu'],
    $_GET['est_usu'],
    $_GET['pri_usu'],
    $id
);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

mysqli_close($conn);

header("Location: ../panel_control.php?page=usuario");
exit();
?>
