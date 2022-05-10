<?php
    include_once("conexion.php");
    $venta = $_POST['venta'];

    $sql = "SELECT * FROM detalle_venta WHERE id_venta = '$venta'";
    $result = $conexion -> query($sql);

    while ( $row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['id_producto'] . "</td>";
        echo "<td>" . $row['nom_producto'] . "</td>";
        echo "<td>" . $row['precio_venta'] . "</td>";
        echo "</tr>";
    }
?>