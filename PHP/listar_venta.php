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

    if(!$resultinsert)
    {
        die("error");
    }
    else
    {
        $query2 = "SELECT P.codigo, P.nom_producto, DV.precio_venta FROM detalle_venta DV JOIN productos P on P.codigo = DV.id_producto where id_venta = '$num_boleta'";
        $resultado2 = mysqli_query($conexion, $query2);
        $total = 0;
        if( !$resultado2)
        {
            die("error");
        }
            else
            {
                while($row = mysqli_fetch_array($resultado2))
                {   echo 
                    "<tr>
                        <td>" . $row['codigo'] . "</td>
                        <td>" . $row['nom_producto'] . "</td>
                        <td>"."$ " . number_format($row['precio_venta'], 0, ',', '.') . "</td>
                    </tr>";  
                    $total += $row['precio_venta'];
                };        
                echo "<td colspan='2' style='text-align:center;'>SubTotal</td>";
                /* echo "<td><input id='monto_total' type='hidden' value='$total'></input>"."$".number_format($total, 0, ',', '.')."<br><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' name='btn_monto_total' id='btn_monto_total'>Generar Pago</button>"."</td>";      */
                echo "<td><input id='monto_total' type='hidden' value='$total'></input>"."$".number_format($total, 0, ',', '.')."<br><button type='button' class='text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2' data-bs-toggle='modal' data-bs-target='#exampleModal' name='btn_monto_total' id='btn_monto_total'>Generar Pago</button></td>";  
            }
    }
?>
<script>
    $("#btn_monto_total").on("click", function () {
        var monto = $('#monto_total').val();
        var num_boleta = document.getElementById("txt_venta").value;
        
        document.getElementById("txt_monto_total_modal").value = monto;
        document.getElementById("txt_numero_boleta_modal").value = num_boleta;
    });
</script>