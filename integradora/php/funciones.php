<?php
   ini_set('display_errors', 'on');
   error_reporting(E_ALL);


   @session_start();
  
   function connectDatabase(){
       // Configuración de la base de datos para conexión
       $servername = "localhost";
       $username = "root";
       $password = "8vSkLsAZ";
       $db_name = "apollo13";
       $db_port= "3306";


       // Crear conexión y retornar el valor de la conexión exitosa o fallida a la variable
       return mysqli_connect($servername, $username, $password, $db_name, $db_port);
   }


   // Reiniciamos el stock de inventario a cero
   function reiniciarACero($id) {
       $conn = connectDatabase();
       $query = "UPDATE inventario SET cant_inv = 0 WHERE id_inv = '$id'";
       mysqli_query($conn, $query);
       mysqli_close($conn);
   }


   // Insertar o actualizar inventario ya existente
   function agregarInventario($id_pro, $id_suc, $cant_inv) {
       $conn = connectDatabase();
      
       // Verificamos si ya existe un inventario con las mismas características
       $query = "SELECT id_inv, cant_inv FROM inventario WHERE id_pro = '$id_pro' AND id_suc = '$id_suc'";
       $result = mysqli_query($conn, $query);


       if (mysqli_num_rows($result) > 0) {
           $row = mysqli_fetch_array($result);
           // Si existe, actualizamos la cantidad
           $nuevo_stock = $row['cant_inv'] + $cant_inv;
           $id_inventario = $row['id_inv'];
           $update_query = "UPDATE inventario SET cant_inv = '$nuevo_stock' WHERE id_inv = '$id_inventario'";
           mysqli_query($conn, $update_query);
       } else {
           // Si no existe, insertamos un nuevo registro
           $insert_query = "INSERT INTO inventario (id_pro, id_suc, cant_inv) VALUES ('$id_pro', '$id_suc', '$can_inv')";
           mysqli_query($conn, $insert_query);
       }


       mysqli_close($conn);
   }
?>
