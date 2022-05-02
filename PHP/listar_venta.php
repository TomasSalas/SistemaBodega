<?php
    include_once("conexion.php");
    $codigo = $_POST['codigo']; 
    $query = "SELECT codigo, nom_producto, precio_venta FROM productos where codigo = '$codigo'";
    $resultado = mysqli_query($conexion, $query);
    
    if( !$resultado){
        die("error");
    }else{
        while($data = mysqli_fetch_assoc($resultado)){
            $arreglo["data"][] = $data;
        }
        echo json_encode($arreglo);
    }
?>