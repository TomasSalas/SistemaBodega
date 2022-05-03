<?php
    include_once("conexion.php");
    $codigo = $_POST['codigo'];
    $data = 0;
    $query = "SELECT * FROM productos where codigo = '$codigo' and cant_producto > 0";
    $result = $conexion -> query($query);
    $row = $result -> fetch_assoc();
    if(!$row){
        echo $data = 1;
    }
    else{
        echo $data = 2;
    }
?>