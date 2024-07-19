<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
        <section class="container my-5">
            <h1>Usuarios</h1>
            <a href="./usuario/agregar_usuario.php" class="btn btn-primary mb-3">Agregar Usuario</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Fecha de nacimiento</th>
                    <th>Ciudad</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Estatus</th>
                    <th>Privilegio</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once './funciones.php';
                $conn = connectDatabase();
                
                $query = "SELECT * FROM USUARIO ";
                $query_result = mysqli_query($conn,$query);
                
                while($row_data = mysqli_fetch_array($query_result)){
                    ?>
            <tr>
                <td><?php echo $row_data["nom_usu"]; ?></td>
                <td><?php echo $row_data["edad_usu"];?></td>
                <td><?php echo $row_data["fech_usu"];?></td>
                <td><?php echo $row_data["ciudad_usu"];?></td>
                <td><?php echo $row_data["correo_usu"];?></td>
                <td><?php echo $row_data["contra_usu"];?></td>
                <td><?php 
                if ($row_data["est_usu"] == 1) {
                    echo "Con acceso";
                } else if ($row_data["est_usu"] == 2) {
                    echo "Sin acceso";
                
                } else {
                    echo "Estado desconocido";
                }
                ?></td>
                <td><?php 
                if ($row_data["pri_usu"] == 1) {
                    echo "Administrador";
                } else if ($row_data["pri_usu"] == 2) {
                    echo "Cliente";
                } else {
                    echo "Estado desconocido";
                }
                ?></td>
                <td>
                <a href="./usuario/editar_usuario.php?id_usu=<?php echo $row_data['id_usu']; ?>" class="btn btn-warning">Editar</a>

                <?php if ($row_data["est_usu"] == 1) { ?>
                    <a href="./usuario/eliminar_usuario.php?id_usu=<?php echo $row_data['id_usu']; ?>" class="btn btn-danger">Dar de baja</a>
                <?php }else{
                    ?>
                    <a href="./usuario/devolver_usuario.php?id_usu=<?php echo $row_data['id_usu']; ?>" class="btn btn-success">Dar de alta</a>
                <?php
                } ?>
                </td>

                <?php
                    }
                ?>

            </tr>
            </tbody>
        </table>
        </section>
    </body>
</html>