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
                        <a class="nav-link active" aria-current="page"href="guardar.php">Guardar Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar.php">Listar Productos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-center">
        <div class="col-md-6 p-5">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <h2>Guardar productos en bodega</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="txt_codigo" placeholder="Codigo" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" id="txt_nombre" placeholder="Nombre Producto" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" class="form-control" id="txt_cantidad" placeholder="Cantidad Producto" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" class="form-control" id="txt_precio_compra" placeholder="Precio Compra" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" class="form-control" id="txt_precio_venta" placeholder="Precio Venta" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea class="form-control" id="txt_comentario" placeholder="Comentario Producto" rows="5" required></textarea>
                        </div>
                        <br>
                        <div class="form-group d-flex justify-content-center">
                            <button type="button" class="btn btn-success btn_guardar" id="btn_guardar">Guardar <i class="fa-solid fa-floppy-disk"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>