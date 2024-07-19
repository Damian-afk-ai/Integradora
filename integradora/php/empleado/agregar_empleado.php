<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <section class="container my-5">
        <h1>Agregar Empleado</h1>
        <form action="./insert_empleado.php" method="get">

            <label class=" form-label mb-2">Nombre</label>
            <input type="text" class="form-control mb-2" name="n1_emp">

            <label class=" form-label mb-2" >Apellido Paterno</label>
            <input type="text" class="form-control mb-2" name="ap_emp">

            <label class=" form-label mb-2">Apellido Materno</label>
            <input type="text" class="form-control mb-2" name="am_emp">

            <label class=" form-label mb-2">Puesto</label>
            <select name="puesto_emp" required>
                <option value="Limpieza">Limpieza</option>
                <option value="Director">Director</option>
                <option value="Sub-Director">Sub-Director</option>
                <option value="Secretaduria">Secretaduria</option>
                <option value="Asistente">Asistente</option>
                <option value="Gerente">Gerente</option>
                <option value="Auxiliar">Auxiliar</option>
            </select>
            <br>

            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </section>
</body>
</html>