<?php
    /* Conexion Mysql    */
    $conexion = mysqli_connect("localhost", "root", "", "bodega");

    if($conexion -> connect_error){
        die("Conexion fallida: ". $conexion -> connect_error);
    }
?>