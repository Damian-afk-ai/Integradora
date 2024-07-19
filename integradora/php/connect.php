<?php
    $servername = "localhost";
    $username = "root";
    $password = "8vSkLsAZ";
    $db_name = "apollo13";
    $db_port= "3306";
    
    $conn = mysqli_connect($servername, $username, $password, $db_name, $db_port);
    
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
?>
