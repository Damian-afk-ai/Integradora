<?php
include "../connect.php";
$query ="SELECT * FROM PRODUCTO,CATEGORIA WHERE PRODUCTO.id_cat = CATEGORIA.id_cat and id_pro = $_GET[id_pro]";
$query_result = mysqli_query($conn,$query);
$user_data = mysqli_fetch_array($query_result);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <section class=" container my-5">
        <h1>Edición de Producto</h1>
        <form action="./update_producto.php" method="get">

            <input type="hidden" name="id_pro" value="<?php echo $user_data['id_pro']; ?>">

            <label class="form-label mb-2">Nombre</label>
            <input type="text" class="form-control mb-2" name="nom_pro" required value="<?php  echo $user_data["nom_pro"]; ?>">

            <label class="form-label mb-2">Desarrolladora</label>
            <input type="text" class="form-control mb-2" name="desa_pro" required value="<?php  echo $user_data["desa_pro"]; ?>">

            <label class="form-label mb-2">Descripcion</label>
            <input type="text" class="form-control mb-2" name="desc_pro" required value="<?php  echo $user_data["desc_pro"]; ?>">

            <label class="form-label mb-2">Costo</label>
            <input type="number" class="form-control mb-2" name="cost_pro" required value="<?php  echo $user_data["cost_pro"]; ?>">

            <label class="form-label mb-2">Precio</label>
            <input type="number" class="form-control mb-2" name="prec_pro" required value="<?php  echo $user_data["prec_pro"]; ?>">

            <label class="form-label mb-2">Categoria</label>
            <select name="id_cat">
                <option value="1">Accion</option>
                <option value="2">Aventura</option>
                <option value="3">Terror</option>
                <option value="4">Carreras</option>
                <option value="5">Suspenso</option>
                <option value="6">Casual</option>
                <option value="7">Deportes</option>
                <option value="8">Estrategia</option>
                <option value="9">Rol</option>
                <option value="10">FPS</option>
            </select>
            <br>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </section>
</body>
</html>