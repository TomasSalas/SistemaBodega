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

    <div class="d-flex justify-content-center">
        <div class="col-md-6 p-5">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <h2>Venta de Productos</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" id="txt_codigo_venta" placeholder="Codigo" required autofocus>
                            <input type="hidden" class="form-control" id="txt_venta" placeholder="Venta" disabled>
                            <button type="button" class="btn btn-success btn_buscar_venta" id="btn_buscar_venta"><i class="fa-solid fa-cart-shopping"></i></button>
                            <button type="button" class="btn btn-danger btn_liberar_venta" id="btn_liberar_venta"><i class="fa-solid fa-delete-left"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2 p-5">
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <table id="dt_cliente" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                    <tr>
                        <th data-priority="1">CODIGO PRODUCTO</th>
                        <th data-priority="2">NOMBRE PRODUCTO</th>
                        <th data-priority="3">PRECIO PRODUCTO</th>
                    </tr>
                </thead>
                <tbody id="table_body">

                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ventana De Pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Numero Boleta</label>
                        <input type="text" id="txt_numero_boleta_modal" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Monto Total</label>
                        <input type="text" id="txt_monto_total_modal" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Tipo Pago</label>
                        <select class="form-select txt_tipo_pago_modal" id="txt_tipo_pago_modal" aria-label="Default select example">
                            <option selected disabled hidden>Seleccione</option>
                            <option value="1">Debito</option>
                            <option value="2">Credito</option>
                            <option value="3">Efectivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>TRX</label>
                        <input type="text" id="txt_trx" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn_generar_cobro" id="btn_generar_cobro">Generar Cobro</button>
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
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
<script>
    codigo_venta();
    enterkey();
</script>

</html>