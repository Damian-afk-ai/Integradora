<?php
include "./php/connect.php";
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // Redirige a la página de inicio de sesión si no ha iniciado sesión
    header("Location: ./login.html");
    exit;
}

// Verifica si se ha proporcionado un id_inv en la URL
if (isset($_GET['id_inv'])) {
    $id_inv = intval($_GET['id_inv']);
    $query = "SELECT * FROM INVENTARIO 
              JOIN PRODUCTO ON INVENTARIO.id_pro = PRODUCTO.id_pro 
              JOIN SUCURSAL ON INVENTARIO.id_suc = SUCURSAL.id_suc 
              WHERE INVENTARIO.id_inv = $id_inv AND est_pro = 1 AND est_suc = 1 AND cant_inv > 0";
    $query_result = mysqli_query($conn, $query);
    $user_data = mysqli_fetch_array($query_result);

    if (!$user_data) {
        die("Producto no encontrado o no disponible.");
    }
} else {
    die("ID de inventario no proporcionado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-image {
            max-width: 100%;
            height: auto;
        }
        .product-details {
            margin-top: 20px;
        }
        .price {
            font-size: 1.5rem;
            color: #007bff;
        }
        .description {
            margin-top: 20px;
        }
        .add-to-cart-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body class="bg-light">
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
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $user_data['nom_pro']; ?></h1>
                <p class="price">$<?php echo number_format($user_data['prec_pro'], 2); ?></p>
                <p class="description"><?php echo $user_data['desc_pro']; ?></p>
                <p class="stock">Cantidad disponible: <?php echo $user_data['cant_inv']; ?></p>
                <form action="./php/add_to_cart.php" method="POST">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Cantidad</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" min="1" max="<?php echo $user_data['cant_inv']; ?>" required>
                    </div>
                    <input type="hidden" name="id_pro" value="<?php echo $user_data['id_pro']; ?>">
                    <button type="submit" class="btn btn-success add-to-cart-btn">Comprar</button>
                </form>
            </div>
        </div>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
