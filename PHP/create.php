<?php
    include_once("conexion.php");

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $comentario = $_POST['comentario'];

    $query = "INSERT INTO productos(codigo,nom_producto,cant_producto,precio_compra,precio_venta,comen_producto)
        VALUES('$codigo','$nombre','$cantidad','$precio_compra','$precio_venta','$comentario')";

    if ($conexion->query($query) === TRUE) {
        echo $data = 1;
    } else {
        echo $data = 2;
    }
?>
