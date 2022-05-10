<?php
    include_once("conexion.php");
    $venta = $_POST['venta'];

    $sql = "DELETE FROM detalle_venta WHERE id_venta = '$venta'";
    $result = $conexion -> query($sql);

    if(!$result)
    {
        echo $data = 2;
    }
    else
    {
        echo $data = 1;
    }
?>