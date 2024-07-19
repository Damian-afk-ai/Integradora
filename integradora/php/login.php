<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciodesesion</title>
</head>
<body> 
<script>

function redirect() {
    setTimeout(function() {
        window.location.href = '../inicio.html';
    }, 5000);
}
</script>
</head>

<body onload="redirect()">
<div class="container">
<h1>Sesion iniciada</h1>
<p>Sesione iniciada con éxito con éxito.</p>
<p class="redirect">Serás redirigido al inicio de la página en breve. Si no eres redirigido automáticamente, haz clic <a href="../inicio.html">aquí</a>.</p>
</div>
</body>

</html>

</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $email = $_POST['email'];
    $password = $_POST['password'];


    echo "Correo electrónico: " . htmlspecialchars($email) . "<br>";
    echo "Contraseña: " . htmlspecialchars($password);
}
?>
