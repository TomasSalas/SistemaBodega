<?php
    /* Conexion Mysql    */
    $conexion = mysqli_connect("db4free.net", "bodega_root", "salas789", "bodega_prueba_2");

    if($conexion -> connect_error){
        die("Conexion fallida: ". $conexion -> connect_error);
    }
?>