<?php
// Aquí incluirás las funciones
require_once '../funciones.php';
// Vamos a verificar si se recibieron los datos por POST
if (!empty($_POST)) {
   // Recibimos los datos del formulario
   $nombre = $_POST['nombre'];
   $email = $_POST['email'];
   $edad = $_POST['edad'];
   $password = $_POST['password'];
   $fecha = $_POST['fecha'];
   $ciudad = $_POST['ciudad'];
   $est_usu = 1;
   $pri_usu = 2;
   // Llamamos a la función para obtener la conexión a la base de datos y asignamos el resultado a una variable
    $conn = connectDatabase();

   // Vamos a validar que el correo no esté registrado previamente
   // Preparamos una query para verificar si el correo ya está en la base de datos
   $query_validar_email = "SELECT * FROM usuario WHERE correo_usu ='$email'";

   // Ejecutamos la query
    $result_validar_email = mysqli_query($conn, $query_validar_email);

   // Vamos a ver cuántas filas devuelve la query
   if (mysqli_num_rows($result_validar_email) > 0) {
       // Si el correo ya existe en la base de datos, redirigimos al login con un mensaje de error
       echo "<script>
               alert('El correo ya está registrado.'); 
               window.location.href = '/HTML/landing_aw/integradora/login.html';
             </script>";
       exit();
   }


   // Insertamos el nuevo usuario en la base de datos
   $query = "INSERT INTO usuario (nom_usu, correo_usu, edad_usu, contra_usu, fech_usu, ciudad_usu, est_usu, pri_usu) VALUES ('$nombre', '$email', '$edad', '$password', '$fecha', '$ciudad', '$est_usu', '$pri_usu')";
   $query_result = mysqli_query($conn,$query);

   // Obtenemos el ID del último usuario insertado en la base de datos
   $id_usu = mysqli_insert_id($conn);

   // Damos de alta la sesión, guardamos el acceso como cliente, el ID del cliente para ventas futuras y el nombre para mostrar mensajes de bienvenida
   $_SESSION['usuario'] = true;
   $_SESSION['id_usu'] = $id_usuario;
   $_SESSION['numbre_usu'] = $nombre;

   // Redirigimos al dashboard del cliente
   header("Location: /HTML/landing_aw/integradora/registrobien.html");
   exit();
} else {
   // Si no se recibieron datos por POST, redirigimos al formulario de registro
   echo "<script>
           alert('Acceso denegado.');
           window.location.href = '/HTML/landing_aw/integradora/login.html';
         </script>";
   exit();
}


// Cerramos la conexión a la base de datos
mysqli_close($conn);
?>
