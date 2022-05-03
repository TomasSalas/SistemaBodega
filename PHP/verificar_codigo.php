<?php
    include_once("conexion.php");
    $codigo = $_POST['codigo'];

    $query = "SELECT * FROM productos where codigo = '$codigo'";
    $result = $conexion -> query($query);
    
    if(!$result){
        echo $data = 1;
    }
    else{
        echo $data =2;
    }
?>