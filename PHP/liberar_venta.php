<?php
    include_once("conexion.php");
    $codigo_venta = $_POST['codigo_venta'];
    $num_boleta = $_POST['num_boleta'];
    $table="";

    $query = "DELETE FROM detalle_venta WHERE id_venta = '$num_boleta'";
    $result = $conexion -> query($query);

    if(!$result){
        die("error");
    }else{
        echo $data = 1;
    };
        
?>