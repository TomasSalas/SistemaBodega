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
        if($usuario == null){
            header("Location: login.php");
        }else{
            include ('PHP/verificar.php');
        }
    ?>

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
                            <input type="text" class="form-control" id="txt_nombre" placeholder="Nombre Producto" >
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" class="form-control" id="txt_cantidad" placeholder="Cantidad Producto" >
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" class="form-control" id="txt_precio_compra" placeholder="Precio Compra" >
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" class="form-control" id="txt_precio_venta" placeholder="Precio Venta" >
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea class="form-control" id="txt_comentario" placeholder="Comentario Producto" rows="5" ></textarea>
                        </div>
                        <br>
                        <div class="form-group d-flex justify-content-center">
                            <button type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 btn_guardar" id="btn_guardar">Guardar Producto</button>
                        </div>
                    </form>
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