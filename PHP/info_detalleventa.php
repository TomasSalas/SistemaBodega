<?php
    include_once("conexion.php");
    $venta = $_POST['venta'];

    $query = "SELECT * FROM detalle_venta DV JOIN productos P ON P.CODIGO = DV.ID_PRODUCTO
    where id_venta = '$venta'";
    $result = $conexion -> query($query);

    while ( $row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['id_producto'] . "</td>";
        echo "<td>" . $row['nom_producto'] . "</td>";
        echo "<td>" . '$' . number_format($row['precio_venta'], 0, ',', '.') . "</td>";
        echo "</tr>";
    }
?>