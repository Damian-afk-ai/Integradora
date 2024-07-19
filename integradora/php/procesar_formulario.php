<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores enviados por el formulario
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $edad = $_POST['edad'] ?? '';
    $password = $_POST['password'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $ciudad = $_POST['ciudad'] ?? '';

    session_start();
    $_SESSION['nombre'] = $nombre;
    $_SESSION['email'] = $email;
    $_SESSION['edad'] = $edad;
    $_SESSION['password'] = $password;
    $_SESSION['fecha'] = $fecha;
    $_SESSION['ciudad'] = $ciudad;

    // Redirecciona a una página de éxito o a donde desees
    header("Location: inicio.html");
    exit();
    } else {
        echo "Todos los campos son requeridos.";
}
?>
