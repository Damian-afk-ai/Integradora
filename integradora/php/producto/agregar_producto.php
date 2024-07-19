<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <section class="container my-5">
        <h1>Agregar Producto</h1>
        <form action="./insert_producto.php" method="get">

            <label class=" form-label mb-2">Nombre</label>
            <input type="text" class="form-control mb-2" name="nom_pro">

            <label class=" form-label mb-2" >Desarrolladora</label>
            <input type="text" class="form-control mb-2" name="desa_pro">

            <label class=" form-label mb-2">Descripcion</label>
            <input type="text" class="form-control mb-2" name="desc_pro">

            <label class=" form-label mb-2">Costo</label>
            <input type="number" class="form-control mb-2" name="cost_pro">

            <label class=" form-label mb-2">Precio</label>
            <input type="number" class="form-control mb-2" name="prec_pro">

            <input type="hidden" class="form-control mb-2" name="est_pro" required value = "1">

            <label class=" form-label mb-2">Categoria</label>
            <select name="id_cat" required>
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

            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </section>
</body>
</html>
