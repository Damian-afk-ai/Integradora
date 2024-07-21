<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <section class="container my-5">
        <h1>Agregar Usuario</h1>
        <form action="./insert_usuario.php" method="get">

            <label class=" form-label mb-2">Nombre</label>
            <input type="text" class="form-control mb-2" name="nom_usu">

            <label class=" form-label mb-2">edad</label>
            <input type="number" min="18" max="99" class="form-control mb-2" name="edad_usu">

            <label class=" form-label mb-2">Fecha de nacimiento</label>
            <input type="date" class="form-control mb-2" name="fech_usu">

            <label class=" form-label mb-2">Ciudad</label>
            <select name="ciudad_usu" class="form-control mb-2" required>
                <option value="">Selecciona tu estado</option>
                <option value="Aguascalientes">Aguascalientes</option>
                <option value="Baja California">Baja California</option>
                <option value="Baja California sur">Baja California sur</option>
                <option value="Campeche">Campeche</option>
                <option value="Chiapas">Chiapas</option>
                <option value="Chiuahua">Chiuahua</option>
                <option value="CDMX">CDMX</option>
                <option value="Coahuila">Coahuila</option>
                <option value="Colima">Colima</option>
                <option value="Durango">Durango</option>
                <option value="Estado de Mexico">Estado de Mexico</option>
                <option value="Guanajuato">Guanajuato</option>
                <option value="Guerrero">Guerrero</option>
                <option value="Hidalgo">Hidalgo</option>
                <option value="Jalisco">Jalisco</option>
                <option value="Michoacan">Michoacan</option>
                <option value="Morelos">Morelos</option>
                <option value="Nayarit">Nayarit</option>
                <option value="Nuevo Leon">Nuevo Leon</option>
                <option value="Oaxaca">Oaxaca</option>
                <option value="Puebla">Puebla</option>
                <option value="Queretaro">Queretaro</option>
                <option value="Quintana Roo">Quintana Roo</option>
                <option value="San Luis Potosi">San Luis Potosi</option>
                <option value="Sinaloa">Sinaloa</option>
                <option value="Sonora">Sonora</option>
                <option value="Tabasco">Tabasco</option>
                <option value="Tamaulipas">Tamaulipas</option>
                <option value="Tlaxcala">Tlaxcala</option>
                <option value="Veracruz">Veracruz</option>
                <option value="Yucatan">Yucatan</option>
                <option value="zacatecas">zacatecas</option>
            </select>

            <br>

            <label class=" form-label mb-2" >Correo</label>
            <input type="email" class="form-control mb-2" name="correo_usu">

            <label class=" form-label mb-2">Contraseña</label>
            <input type="text" class="form-control mb-2" name="contra_usu">

            <input type="hidden" class="form-control mb-2" name="est_usu" required value = "1">

            <label class="form-label mb-2">Privilegio</label>
            <select name="pri_usu" class="form-control mb-2">
                <option value="2">Cliente</option>
                <option value="1">Administrador</option>
            </select>
            <br>

            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </section>
</body>
</html>
