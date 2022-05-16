<?php
    include_once("conexion.php");

    $num_boleta = $_POST['num_boleta'];
    $monto_total = $_POST['monto_total'];
    $tipo_pago = $_POST['tipo_pago'];
    $trx = $_POST['trx'];
    $fecha = date("Y-m-d");
   

    $query = "INSERT INTO venta (id_venta , fecha , precio_venta ,id_tipo_pago, trx ) VALUES ('$num_boleta' , '$fecha' , '$monto_total', '$tipo_pago', '$trx')";
    $result = $conexion -> query($query);

    if(!$result){
        die("error");
    }else{
        $query2 = "SELECT id_producto , COUNT(id_producto) FROM detalle_venta WHERE id_venta = '$num_boleta' GROUP BY id_producto";
        $result2 = $conexion -> query($query2);
        $row = $result2 -> fetch_assoc();
        $cantidad = $row['COUNT(id_producto)'];
        $codigo = $row['id_producto'];

        $query3 = "UPDATE productos SET cant_producto = cant_producto - '$cantidad' WHERE codigo = '$codigo'";
        $result3 = $conexion -> query($query3);
        
        echo $data = 1;
    };


?>