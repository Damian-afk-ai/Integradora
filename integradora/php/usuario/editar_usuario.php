<?php
require_once '../funciones.php';
$conn = connectDatabase();
$query ="SELECT * FROM USUARIO WHERE id_usu = $_GET[id_usu]";
$query_result = mysqli_query($conn,$query);
$user_data = mysqli_fetch_array($query_result);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <section class=" container my-5">
        <h1>Edición de Usuario</h1>
        <form action="./update_usuario.php" method="get">

            <input type="hidden" name="id_usu" value="<?php echo $user_data['id_usu']; ?>">

            <label class="form-label mb-2">Nombre</label>
            <input type="text" class="form-control mb-2" name="nom_usu" required value="<?php  echo $user_data["nom_usu"]; ?>">

            <label class="form-label mb-2">Edad</label>
            <input type="number" name="edad_usu" value="<?php echo $user_data['edad_usu']; ?>">

            <label class="form-label mb-2">Fecha de nacimiento</label>
            <input type="text" name="fech_usu" value="<?php echo $user_data['fech_usu']; ?>">

            <label class="form-label mb-2">Ciudad</label>
            <input type="text" name="ciudad_usu" value="<?php echo $user_data['ciudad_usu']; ?>">
            <br>
            <label class="form-label mb-2">Correo</label>
            <input type="email" class="form-control mb-2" name="correo_usu" required value="<?php  echo $user_data["correo_usu"]; ?>">

            <label class="form-label mb-2">Contraseña</label>
            <input type="text" class="form-control mb-2" name="contra_usu" required value="<?php  echo $user_data["contra_usu"]; ?>">

            <input type="hidden" name="est_usu" value="<?php echo $user_data['est_usu']; ?>">

            <label class="form-label mb-2">Privilegio</label>
            <select name="pri_usu">
                <option value="2">Cliente</option>
                <option value="1">Administrador</option>
            </select>
            <br>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </section>
</body>
</html>