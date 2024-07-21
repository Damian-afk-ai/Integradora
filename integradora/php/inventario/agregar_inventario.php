<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <section class="container my-5">
        <h1>Agregar Inventario</h1>
        <form action="./insert_inventario.php" method="get">

            <label class=" form-label mb-2">Producto</label>
            <select name="id_pro" class="form-control mb-2" required>
            <?php
                include '../connect.php';
                
                $query = "SELECT * FROM PRODUCTO";
                $query_result = mysqli_query($conn,$query);
                
                while($row_data = mysqli_fetch_array($query_result)){
                    ?>
                    <option  value="<?php echo $row_data['id_pro']; ?>"><?php echo $row_data["nom_pro"]; ?></option>
                    
                    <?php
                }
                ?>
            </select>

            <br>

            <label class="form-label mb-2">Sucursal</label>
            <select name="id_suc" class="form-control mb-2">
                <option value="1">Querétaro</option>
                <option value="3">Sanluis Potosi</option>
                <option value="2">Guanajuato</option>
            </select>

            <br>

            <label class=" form-label mb-2">Stock</label>
            <input type="number" min="1" class="form-control mb-2" name="cant_inv">

            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </section>
</body>
</html>
