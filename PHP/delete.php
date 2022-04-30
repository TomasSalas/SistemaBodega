<?php
    include_once("conexion.php");

    $codigo = $_POST['codigo'];
    
    $query = "UPDATE productos SET estado = 0 WHERE codigo = '$codigo'";

    if ($conexion->query($query) === TRUE) {
        echo $data = 1;
    } else {
        echo $data = 2;
    }
?>