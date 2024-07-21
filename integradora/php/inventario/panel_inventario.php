<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
        <section class="container my-5">
            <h1>INVENTARIO</h1>
            <a href="./inventario/agregar_inventario.php" class="btn btn-primary mb-3">Agregar inventario</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Stock</th>
                    <th>Sucursal</th>
                    <th>Estatus</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once './funciones.php';
                $conn = connectDatabase();
                
                $query = "SELECT * FROM INVENTARIO,PRODUCTO,SUCURSAL WHERE INVENTARIO.id_pro = PRODUCTO.id_pro and INVENTARIO.id_suc = SUCURSAL.id_suc";
                $query_result = mysqli_query($conn,$query);
                
                while($row_data = mysqli_fetch_array($query_result)){
                    ?>
            <tr>
                <td><?php echo $row_data["nom_pro"]; ?></td>
                <td><?php echo $row_data["cant_inv"];?></td>
                <td><?php echo $row_data["nom_suc"];?></td>
                <td><?php 
                if ($row_data["cant_inv"] <= 0) {
                    echo "No disponible";
                } else if ($row_data["cant_inv"] >= 1) {
                    echo "Disponible";
                } else {
                    echo "Estado desconocido";
                }
                ?></td>
                <td>
                <a href="./inventario/editar_inventario.php?id_inv=<?php echo $row_data['id_inv']; ?>" class="btn btn-warning">Editar</a>
                <a href="./inventario/vaciar_inventario.php?id_inv=<?php echo $row_data['id_inv']; ?>" class="btn btn-danger">Vaciar</a>
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
