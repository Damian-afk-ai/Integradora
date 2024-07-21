<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
        <section class="container my-5">
            <h1>Productos</h1>
            <a href="./producto/agregar_producto.php" class="btn btn-primary mb-3">Agregar Producto</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Desarrolladora</th>
                    <th>Descripcion</th>
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Disponible</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include './connect.php';
                
                $query = "SELECT * FROM PRODUCTO,CATEGORIA WHERE PRODUCTO.id_cat = CATEGORIA.id_cat ";
                $query_result = mysqli_query($conn,$query);
                
                while($row_data = mysqli_fetch_array($query_result)){
                    ?>
            <tr>
                <td><?php echo $row_data["nom_pro"]; ?></td>
                <td><?php echo $row_data["desa_pro"];?></td>
                <td><?php echo $row_data["desc_pro"];?></td>
                <td>$<?php echo $row_data["cost_pro"];?></td>
                <td>$<?php echo $row_data["prec_pro"];?></td>
                <td><?php echo $row_data["nom_cat"];?></td>
                <td><?php 
                if ($row_data["est_pro"] == 1) {
                    echo "SI";
                } else if ($row_data["est_pro"] == 2) {
                    echo "NO";
                } else {
                    echo "Estado desconocido";
                }
                ?></td>
                <td>
                <a href="./producto/editar_producto.php?id_pro=<?php echo $row_data['id_pro']; ?>" class="btn btn-warning">Editar</a>

                <?php if ($row_data["est_pro"] == 1) { ?>
                    <a href="./producto/eliminar_producto.php?id_pro=<?php echo $row_data['id_pro']; ?>" class="btn btn-danger">Dar de baja</a>
                <?php }else{
                    ?>
                    <a href="./producto/devolver_producto.php?id_pro=<?php echo $row_data['id_pro']; ?>" class="btn btn-success">Dar de alta</a>
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
