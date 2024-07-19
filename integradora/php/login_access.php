<?php
// Incluimos las funciones necesarias
require_once 'funciones.php';

// Vamos a verificar si se recibieron los datos por POST
if (!empty($_POST)) {
    // Recibimos los datos del formulario de login por POST
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Llamamos a la función para obtener la conexión a la base de datos y la asignamos a una variable
    $conn = connectDatabase();

    // Hagamos una consulta para verificar si el correo pertenece a un administrador
    $query_admin = "SELECT * FROM usuario WHERE correo_usu = '$email' AND contra_usu = '$password' AND est_usu = 1";

    // Ejecutamos la consulta
    $result_admin = mysqli_query($conn, $query_admin);

    // Verificamos si la consulta devolvió algún resultado
    if (mysqli_num_rows($result_admin) == 1) {
        // Si existe como administrador, iniciamos sesión de administrador
        session_start();
        $_SESSION['admin'] = true;
        header("Location: ./panel_control.php"); // Redirigimos al panel de administrador
        exit();
    }

    // Hagamos una consulta para verificar si el correo pertenece a un cliente
    $query_usuario = "SELECT * FROM usuario WHERE correo_usu = '$email' AND contra_usu = '$password' AND pri_usu = 2";

    // Ejecutamos la consulta
    $result_usuario = mysqli_query($conn, $query_usuario);

    // Verificamos si la consulta devolvió algún resultado
    if (mysqli_num_rows($result_usuario) == 1) {
        // Si existe como cliente, iniciamos sesión de cliente
        session_start();
        $usuario = mysqli_fetch_array($result_usuario);
        $_SESSION['usuario'] = true;
        $_SESSION['id_usu'] = $usuario['id_usu'];
        $_SESSION['nombre_usu'] = $usuario['nom_usu'];

        // Redirigimos al dashboard del cliente
        header("Location: ./usuario/panel_usuario.php"); // Redirigimos al panel de cliente
        exit();
    } else {
        // Si no existe en ninguna tabla, hay un error en las credenciales
        echo "<script>
                alert('Correo no registrado, favor de registrarse.');
                window.location.href = '/HTML/landing_aw/integradora/login.html';
              </script>";
        exit();
    }
} else {
    // Si no se recibió nada desde el formulario no permitimos ningún acceso
    echo "<script>
            alert('Acceso denegado.');
            window.location.href = '/HTML/landing_aw/integradora/l';
          </script>";
    exit();
}

// Cerramos la conexión a la base de datos
mysqli_close($conn);
?>
