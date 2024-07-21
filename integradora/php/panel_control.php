
<?php
@session_start();
if(!isset($_SESSION['admin'])){
   // Si no eres cliente, no te permito el acceso
   echo "<script>
           alert('Acceso denegado.');
           window.location.href = '../login.html';
         </script>";
   exit();
}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        @media (max-width:1025px){
            .min-vh-100{
                min-height: auto!important; 
            }
        }
    </style>
</head>
<body>
    <header class="bg-dark">
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand text-white" href="#">PANEL DE CONTROL</a>
                <ul class="nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="" alt="" width="30">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="../login.html">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    <section id="dashboard">
        <div class="row">
            <nav id="sidebar" class="col-12 col-lg-2 bg-light p-4 min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-lg-column justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="?page=producto">
                                Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=usuario">
                                Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=empleado">
                                Empleados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=inventario">
                                Inventario
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=reportes">
                                Reportes
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-12 col-lg-10 p-4">
                <div class="container">
                    <?php
                        // Obtener el valor de 'page' de la URL
                        $page = isset($_GET['page']) ? $_GET['page'] : 'inicio';

                        // Determinar el archivo a incluir basado en el valor de 'page'
                        switch($page) {
                            case 'producto':
                                require_once './producto/panel_producto.php';
                                break;
                            case 'usuario':
                                require_once './usuario/panel_usuario.php';
                                break;
                            case 'empleado':
                                require_once './empleado/panel_empleado.php';
                                break;
                            case 'inventario':
                                require_once './inventario/panel_inventario.php';
                                break;
                            case 'reportes':
                                require_once './reporte/panel_reporte.php';
                                break;
                            default:
                                echo '<h1>Bienvenido al Panel de Control</h1>';
                        }
                    ?>
                </div>
            </main>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}
?>
