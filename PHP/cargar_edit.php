<?php
    include_once("conexion.php");
    
    $codigo = $_POST['codigo'];
 
    $query = "SELECT * FROM productos WHERE codigo = '$codigo'";
    $result = $conexion -> query($query);
    $row = $result -> fetch_assoc();
    $data = array(
        'codigo' => $row['codigo'],
        'nombre' => $row['nom_producto'],
        'cantidad' => $row['cant_producto'],
        'precio_compra' => $row['precio_compra'],
        'precio_venta' => $row['precio_venta'],
        'comentario' => $row['comen_producto']
    );
    echo json_encode($data);
?>