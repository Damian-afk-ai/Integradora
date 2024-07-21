<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Apollo13</title>
        <link rel="stylesheet" href="./css/inicio.css">
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
        <!-- inicio Section -->
        <section id="eslogan">
            <div class="row">
                    <div class="col">
                    <br>
                    <h1>Compra juegos a otro nivel</h1>
                    <br>
                    <p>Cada juego es un mundo a descubrir</p>
                    <img src="./img/imagen_1.png" alt="">
                    <br><br><br>
                </div>
            </div>
        </section>
        <!-- Nosotros Section -->
        <section id="nosotros">
            <div class="row">
                <br><br><br>
                <h2>Acerca de nosotros</h2>
                <div class="cols">
                    <div class="col">
                        <p>Somos una empresa especializada en la venta de videojuegos,<br>Buscamos hacerte un amante de los videojuegos</p>
                    </div>
                    <div class="col">
                        <img src="./img/imagen_2.png" alt="imagen.1">
                        <br><br><br>
                    </div>
                </div>
            </div>
        </section>
        <!-- Beneficios y experencia Section -->
        <section id="experencia">
            <div class="row">
                <br><br><br>
                <h2>Experencia y Beneficios</h2>
                <div class="cols">
                    <div class="col">
                        <h3>Beneficios</h3>
                        
                            <p>Honestidad</p>
                            <p>Confiabilidad</p>
                            <p>Profesionalismo</p>
                            <p>24/7 atención al cliente</p>
                        
                    </div>
                    <div class="col">
                        <h3>Experencia</h3>
                        
                            <p>Colaboradores de alto nivel</p>
                            <p>Más de 10 años</p>
                            <p>Nuestros trabajadores tienen gran nivel de certificaciones</p>
                        
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
