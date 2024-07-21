<?php
include '../connect.php';

// Obtener los valores de los parámetros GET de manera segura
$cant_inv = $_GET['cant_inv'];
$id_pro = $_GET['id_pro'];
$id_suc = $_GET['id_suc'];

// Verificar si el registro con id_pro y id_suc ya existe
$query_check = "SELECT * FROM INVENTARIO WHERE id_pro = $id_pro AND id_suc = $id_suc";
$result_check = mysqli_query($conn, $query_check);

if (mysqli_num_rows($result_check) > 0) {
    // El registro existe, actualizar cant_inv
    $query_update = "UPDATE INVENTARIO SET cant_inv = cant_inv + $cant_inv WHERE id_pro = $id_pro AND id_suc = $id_suc";
    
    if (mysqli_query($conn, $query_update)) {
        // Redirigir si la actualización fue exitosa
        header("Location: ../panel_control.php?page=inventario");
        exit();
        
    } else {
        // Manejo de errores en la actualización
        echo "Error al actualizar el inventario: " . mysqli_error($conn);
    }
} else {
    // El registro no existe, insertar nuevo registro
    $query_insert = "INSERT INTO INVENTARIO (cant_inv, id_pro, id_suc) VALUES ($cant_inv, $id_pro, $id_suc)";
    
    if (mysqli_query($conn, $query_insert)) {
        // Redirigir si la inserción fue exitosa
        header("Location: ../panel_control.php?page=inventario");
        exit();
    } else {
        // Manejo de errores en la inserción
        echo "Error al insertar en el inventario: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>
