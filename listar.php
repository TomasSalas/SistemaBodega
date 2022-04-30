<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodega</title>


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.5/css/scroller.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js  "></script>
    <!-- Locales -->
    <script src="JS/main.js" type=" text/javascript"></script>
    <link rel="stylesheet" href="CSS/main.css">
    <!-- Font  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bodega</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="guardar.php">Guardar Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="listar.php">Listar Productos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-center">
        <div class="col-md-10 p-5">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <h2>Lista de productos en bodega</h2>
                </div>
                <div class="card-body">
                    <table class="table display nowrap" id="table_listar">
                        <thead>
                            <tr>
                                <th scope="col">Codigo Producto</th>
                                <th scope="col">Nombre Producto</th>
                                <th scope="col">Cantidad Producto</th>
                                <th scope="col">Precio Compra</th>
                                <th scope="col">Precio Venta</th>
                                <th scope="col">Comentario</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once 'PHP/conexion.php';
                            $sql = "SELECT * FROM productos";
                            $result = $conexion -> query($sql);
                            while($row = $result -> fetch_assoc()){
                                echo "<tr>";
                                echo "<td>". $row["codigo"]."</td>";
                                echo "<td>". $row["nom_producto"]."</td>";
                                echo "<td>". $row["cant_producto"]."</td>";
                                echo "<td>". $row["precio_compra"]."</td>";
                                echo "<td>". $row["precio_venta"]."</td>";
                                echo "<td>". $row["comen_producto"]."</td>";
                                echo "<td>" ."<button type='button' class='btn btn-warning btn_editar'id='btn_editar' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Editar</button>"."</td>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>Codigo Producto</label>
                    <input type="text" class="form-control" id="txt_edit_cod" disabled>
                </div>
                <div class="modal-body">
                    <label>Nombre Producto</label>
                    <input type="text" class="form-control" id="txt_edit_nom">
                </div>
                <div class="modal-body">
                    <label>Cantidad Producto</label>
                    <input type="number" class="form-control" id="txt_edit_cant">
                </div>
                <div class="modal-body">
                    <label>Precio Compra</label>
                    <input type="number" class="form-control" id="txt_edit_precio_compra">
                </div>
                <div class="modal-body">
                    <label>Precio Venta</label>
                    <input type="number" class="form-control" id="txt_edit_precio_venta">
                </div>
                <div class="modal-body">
                    <label>Comentario Producto</label>
                    <input type="text" class="form-control" id="txt_edit_coment">
                </div>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="btn_editar_bd" class="btn btn-warning btn_editar_bd">Editar Producto</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>