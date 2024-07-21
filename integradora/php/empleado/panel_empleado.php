<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
        <section class="container my-5">
            <h1>Empleados</h1>
            <a href="./empleado/agregar_empleado.php" class="btn btn-primary mb-3">Agregar Empleado</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Puesto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include './connect.php';
                
                $query = "SELECT * FROM EMPLEADO";
                $query_result = mysqli_query($conn,$query);
                
                while($row_data = mysqli_fetch_array($query_result)){
                    ?>
            <tr>
                <td><?php echo $row_data["n1_emp"]; ?></td>
                <td><?php echo $row_data["ap_emp"];?></td>
                <td><?php echo $row_data["am_emp"];?></td>
                <td><?php echo $row_data["puesto_emp"];?></td>
                <td>
                <a href="./empleado/editar_empleado.php?id_emp=<?php echo $row_data['id_emp']; ?>" class="btn btn-warning">Editar</a>
                <a href="./empleado/eliminar_empleado.php?id_emp=<?php echo $row_data['id_emp']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php
                }
                ?>
            </tbody>
        </table>
        </section>
    </body>
</html>
