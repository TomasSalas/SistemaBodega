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
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
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
                        <a class="nav-link active" aria-current="page" href="guardar.php">Guardar Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar.php">Listar Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="venta.php">Venta Productos</a>
                    </li>
                </ul>

                <form class="d-flex">
                    <button class="btn btn-success" type="button">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-center">
        <div class="col-md-6 p-5">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <h2>Venta de Productos</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" id="txt_codigo_venta" placeholder="Codigo" required>
                            <input type="text" class="form-control" id="txt_venta" placeholder="Venta" disabled>
                        </div>

                        <br>
                        <div class="form-group d-flex justify-content-center">
                            <button type="button" class="btn btn-success btn_buscar_venta" id="btn_buscar_venta"><i class="fa-solid fa-cart-shopping"></i></button>
                        </div>
                        <br>
                        <div class="form-group d-flex justify-content-center">
                            <button type="button" class="btn btn-danger btn_liberar_venta" id="btn_liberar_venta"><i class="fa-solid fa-delete-left"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <div class="col-md-8 p-5">
            <table id="dt_cliente" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Codigo Producto</th>
                        <th>Nombre Producto</th>
                        <th>Precio Producto</th>
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
            <select class="form-select txt_tipo_pago_modal"  id="txt_tipo_pago_modal" aria-label="Default select example">
                <option value="1">Debito</option>
                <option value="2">Credito</option>
                <option value="3">Efectivo</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn_generar_cobro" id="btn_generar_cobro">Generar Cobro</button>
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    
</body>
<script>
    codigo_venta();
</script>
</html>