<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Productos</title>

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">	
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" />
    
    <link href="CSS/main.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <?php
    $usuario = $_GET['usuario'];
    if ($usuario == null) {
        header("Location: login.php");
    } else {
        include('PHP/verificar.php');
    }
    ?>

    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2 p-5">
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <table id="users" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr class="bg-slate-300 bg-opacity-100 text-black">
                        <th data-priority="1">CODIGO VENTA</th>
                        <th data-priority="2">NOMBRE PRODUCTO</th>
                        <th data-priority="3">CANTIDAD</th>
                        <th data-priority="4">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once 'PHP/conexion.php';
                    $sql = "SELECT DV.ID_VENTA,P.NOM_PRODUCTO, COUNT(DV.ID_PRODUCTO) AS PRODU FROM detalle_venta DV 
                    JOIN PRODUCTOS P ON P.CODIGO = DV.ID_PRODUCTO 
                    WHERE NOT EXISTS (SELECT * FROM venta V WHERE V.ID_VENTA = DV.ID_VENTA) GROUP BY DV.ID_VENTA";
                    $result = $conexion->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['ID_VENTA'] . '</td>';
                        echo '<td>' . $row['NOM_PRODUCTO'] . '</td>';
                        echo '<td>' . $row['PRODU'] . '</td>';
                        echo '<td>';
                        echo '<button class="btn btn-warning btn-detalle-venta" data-id="' . $row['ID_VENTA'] . '">Detalle Productos</button>';
                        echo '<button class="btn btn-danger btn-eliminar-detalle" data-id="' . $row['ID_VENTA'] . '">Eliminar</button>';
                    ?>
                    <?php echo '</td>';
                        echo '</tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modaldetalleventa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle Venta Nula</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table">
                        <thead>
                            <tr>
                                <th>Codigo </th>
                                <th>Nombre </th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody id="detalle_venta_nulo">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="JS/main.js" type=" text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
</body>

</html>