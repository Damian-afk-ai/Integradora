<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Sucursales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
        <section class="container my-5">
            <h1>Sucursal</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Disponible</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include './connect.php';
                
                $query = "SELECT * FROM SUCURSAL";
                $query_result = mysqli_query($conn,$query);
                
                while($row_data = mysqli_fetch_array($query_result)){
                    ?>
            <tr>
                <td><?php echo $row_data["nom_suc"]; ?></td>
                <td><?php echo $row_data["tel_suc"];?></td>
                <td><?php 
                if ($row_data["est_suc"] == 1) {
                    echo "SI";
                } else if ($row_data["est_suc"] == 2) {
                    echo "NO";
                } else {
                    echo "Estado desconocido";
                }
                ?></td>
                <td>
                <?php if ($row_data["est_suc"] == 1) { ?>
                    <a href="./sucursal/eliminar_sucursal.php?id_suc=<?php echo $row_data['id_suc']; ?>" class="btn btn-danger">Dar de baja</a>
                <?php }else{
                    ?>
                    <a href="./sucursal/devolver_sucursal.php?id_suc=<?php echo $row_data['id_suc']; ?>" class="btn btn-success">Dar de alta</a>
                <?php
                } ?>
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