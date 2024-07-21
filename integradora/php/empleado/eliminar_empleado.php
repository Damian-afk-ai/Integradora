<?php
include '../connect.php';

$query = "DELETE FROM EMPLEADO WHERE id_emp = $_GET[id_emp]";

$query_result = mysqli_query($conn, $query);

mysqli_close($conn);

header("Location: ../panel_control.php?page=empleado");
