<?php
    include_once("conexion.php");

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $comentario = $_POST['comentario'];

    $query = "UPDATE productos SET nom_producto = '$nombre', cant_producto = '$cantidad', precio_compra = '$precio_compra', precio_venta = '$precio_venta', comen_producto = '$comentario' WHERE codigo = '$codigo'";
    if ($conexion->query($query) === TRUE) {
        echo $data = 1;
    } else {
        echo $data = 2;
    }
?>