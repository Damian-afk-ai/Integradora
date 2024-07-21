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
        <form action="./insert_producto.php" method="get" onsubmit="calculatePrice()">

            <label class="form-label mb-2">Nombre</label>
            <input type="text" class="form-control mb-2" name="nom_pro" required>

            <label class="form-label mb-2">Desarrolladora</label>
            <input type="text" class="form-control mb-2" name="desa_pro" required>

            <label class="form-label mb-2">Descripcion</label>
            <input type="text" class="form-control mb-2" name="desc_pro" required>

            <label class="form-label mb-2">Costo</label>
            <input type="number" class="form-control mb-2" id="cost_pro" name="cost_pro" required>

            <input type="hidden" class="form-control mb-2" id="prec_pro" name="prec_pro">

            <label class="form-label mb-2">Categoria</label>
            <select name="id_cat" class="form-control mb-2" required>
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
            
            <input type="hidden" class="form-control mb-2" name="est_pro" required value="1">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </section>
    <script>
        function calculatePrice() {
            const cost = document.getElementById('cost_pro').value;
            const price = cost * 1.15;
            document.getElementById('prec_pro').value = price.toFixed(2); // Redondea a 2 decimales
        }
    </script>
</body>
</html>
