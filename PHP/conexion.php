<?php
    /* Conexion Mysql    */
    /* $conexion = mysqli_connect("db4free.net", "bodega_root", "salas789", "bodega_prueba_2"); */
    /* $conexion = mysqli_connect("localhost", "root", "", "bodega"); */

    $conexion = mysqli_connect("45.239.108.200", "gygasoci_tomas", "Saalaas7890", "gygasoci_bodega");

    if($conexion -> connect_error){
        die("Conexion fallida: ". $conexion -> connect_error);
    };
?>