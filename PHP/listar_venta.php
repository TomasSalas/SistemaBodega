<?php
    include_once("conexion.php");
    $codigo_venta = $_POST['codigo_venta'];
    $num_boleta = $_POST['num_boleta'];
    $table="";
    
    $query = "SELECT * FROM productos where codigo = '$codigo_venta'";
    $result = $conexion -> query($query);
    $row = $result -> fetch_assoc();

    $codigo = $row['codigo'];
    $precio_venta = $row['precio_venta'];

    $queryinsert = "INSERT INTO detalle_venta (id_venta , id_producto , precio_venta)
    VALUES ('$num_boleta' , '$codigo' , '$precio_venta')";
    $resultinsert = $conexion -> query($queryinsert);

    if(!$resultinsert){
        die("error");
    }else{
        $query2 = "SELECT DV.id_venta, P.nom_producto, DV.precio_venta FROM detalle_venta DV JOIN productos P on P.codigo = DV.id_producto where id_venta = '$num_boleta'";
        $resultado2 = mysqli_query($conexion, $query2);
        $total = 0;
        if( !$resultado2){
            die("error");
            }else{
                echo "<table>"; 
        
                while($row = mysqli_fetch_array($resultado2)){   
                    
                echo 
                "<tr>
                    <td>" . $row['id_venta'] . "</td>
                    <td>" . $row['nom_producto'] . "</td>
                    <td>"."$ " . number_format($row['precio_venta'], 0, ',', '.') . "</td>
                </tr>";  
                $total += $row['precio_venta'];
            }
            echo "<td style='text-align:center;'>SubTotal</td>";
            echo "<td colspan='2' style='text-align:center;'>" ."$ ".number_format($total, 0, ',', '.'). "<button class='btn btn-primary btn_pagar' id='btn_pagar' data-id='$total'> Pagar</button></td>";
            echo "</table>"; 
        }
    }
?>