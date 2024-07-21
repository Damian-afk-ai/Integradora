<?php
include "../connect.php";
$query ="SELECT * FROM INVENTARIO,PRODUCTO,SUCURSAL WHERE INVENTARIO.id_pro = PRODUCTO.id_pro and INVENTARIO.id_suc = SUCURSAL.id_suc and id_inv = $_GET[id_inv]";
$query_result = mysqli_query($conn,$query);
$user_data = mysqli_fetch_array($query_result);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <section class=" container my-5">
        <h1>Edición de Inventario</h1>
        <form action="./update_inventario.php" method="get">

            <input type="hidden" name="id_inv" value="<?php echo $user_data['id_inv']; ?>">

            <label class="form-label mb-2">Producto</label>
            <input type="block" class="form-control mb-2" name="nom_pro" required value="<?php  echo $user_data["nom_pro"]; ?>">

            <label class="form-label mb-2">Sucursal</label>
            <select name="id_suc" class="form-control mb-2">
                <option value="1">Querétaro</option>
                <option value="3">Sanluis Potosi</option>
                <option value="2">Guanajuato</option>
            </select>
            <br>

            <label class="form-label mb-2">Stock</label>
            <input type="number" min="1" class="form-control mb-2" name="cant_inv" required value="<?php  echo $user_data["cant_inv"]; ?>">

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </section>
</body>
</html>
