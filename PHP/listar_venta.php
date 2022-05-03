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
        $query2 = "SELECT DV.id_venta, P.nom_producto, DV.precio_venta FROM detalle_venta DV JOIN productos P on P.codigo = DV.id_producto where id_venta = '$num_boleta'";
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
                        <td>" . $row['id_venta'] . "</td>
                        <td>" . $row['nom_producto'] . "</td>
                        <td>"."$ " . number_format($row['precio_venta'], 0, ',', '.') . "</td>
                    </tr>";  
                    $total += $row['precio_venta'];
                    
                }        
                echo "<td colspan='2' style='text-align:center;'>SubTotal</td>";
                    echo ".<input id='monto_total' type='hidden' value='$total'> </input>.<td id='monto_total'>"."$ ".number_format($total, 0, ',', '.')."<button type='button' class='btn btn-primary' name='btn_monto_total' id='btn_monto_total' data-monto='$total'>Pagar</button>". "</td>";        
            }
    }

    
?>
<script>
    $("#btn_monto_total").on("click", function () {
        var monto = $('#monto_total').val();
        var num_boleta = document.getElementById("txt_venta").value;
        $.ajax({
            type: "POST",
            url: "PHP/generar_venta.php",
            data: {
                monto: monto,
                num_boleta: num_boleta
            },
            success: function (data) {
                if(data == 1)
                {
                    Swal.fire(
                    'Venta Correcta',
                    'Venta  Exitosa',
                    'success'
                    ).then(function () { 
                        window.location.reload();
                    });
                }
                else
                {
                    Swal.fire(
                    'Venta Incorrecta',
                    'Venta Fallida',
                    'error'
                ).then(function () { 
                    window.location.reload();
                });
                }
            }
        });
    });
</script>