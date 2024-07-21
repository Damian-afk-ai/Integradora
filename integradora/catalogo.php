<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="./css/catalogo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <?php
    session_start();
    ?>
    <header class="bg-dark sticky-top w-100">
        <div class="container">
            <nav class="navbar">
                <a href="#" class="navbar-brand">
                    <img src="./img/logo.png" alt="Logo" height="60">
                </a>
                <ul class="nav fs-5">
                    <li class="nav-item"><a href="./inicio.php" class="text-white nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="./catalogo.php" class="text-white nav-link">Catálogo</a></li>
                    <?php
                    if (isset($_SESSION['usuario'])) {
                        echo '<li class="nav-item"><a href="./php/logout.php" class="text-white nav-link">Cerrar Sesión</a></li>';
                    } else {
                        echo '<li class="nav-item"><a href="./login.html" class="text-white nav-link">Login</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section>
            <div class="container">
                <form method="GET" action="">
                    <div class="mb-3">
                        <label for="sucursal" class="form-label">Sucursal:</label>
                        <select name="sucursal" id="sucursal" class="form-select">
                            <option value="">Todas</option>
                            <option value="1">Querétaro</option>
                            <option value="3">San Luis Potosí</option>
                            <option value="2">Guanajuato</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>
        </section>
        <section>
            <div class="container">
                <?php
                require_once './php/funciones.php';
                $conn = connectDatabase();

                if (!$conn) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                $sucursal = isset($_GET['sucursal']) ? $_GET['sucursal'] : '';

                $query = "SELECT * FROM INVENTARIO 
                          JOIN PRODUCTO ON INVENTARIO.id_pro = PRODUCTO.id_pro 
                          JOIN SUCURSAL ON INVENTARIO.id_suc = SUCURSAL.id_suc 
                          WHERE est_pro = 1 AND est_suc = 1 AND cant_inv > 0";

                if ($sucursal) {
                    $query .= " AND SUCURSAL.id_suc = '" . mysqli_real_escape_string($conn, $sucursal) . "'";
                }

                $query_result = mysqli_query($conn, $query);

                if (!$query_result) {
                    die("Error en la consulta: " . mysqli_error($conn));
                }

                $productos_por_sucursal = [];
                while ($row_data = mysqli_fetch_assoc($query_result)) {
                    $productos_por_sucursal[$row_data['id_suc']]['nombre_sucursal'] = $row_data['nom_suc'];
                    $productos_por_sucursal[$row_data['id_suc']]['productos'][] = $row_data;
                }

                foreach ($productos_por_sucursal as $id_suc => $sucursal) {
                    echo '<h2>' . htmlspecialchars($sucursal['nombre_sucursal']) . '</h2>';
                    echo '<div class="row">';
                    foreach ($sucursal['productos'] as $producto) {
                        ?>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($producto['nom_pro']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($producto['desc_pro']); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted">$<?php echo htmlspecialchars($producto['prec_pro']); ?></span>
                                        <a href="./one_producto.php?id_inv=<?php echo htmlspecialchars($producto['id_inv']); ?>" class="btn btn-primary">Comprar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </section>
    </main>
</body>
</html>
