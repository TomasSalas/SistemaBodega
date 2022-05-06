<?php
$error = "";
if(isset($_GET['error'])){
    $error = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> No se puede modificar la ruta.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}else{
    $error = '';
}

 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodega</title>

    
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.19.0/js/md5.min.js" integrity="sha512-8pbzenDolL1l5OPSsoURCx9TEdMFTaeFipASVrMYKhuYtly+k3tcsQYliOEKTmuB1t7yuzAiVo+yd7SJz+ijFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <!-- Locales -->
    <script src="JS/main.js" type=" text/javascript"></script>
    <link rel="stylesheet" href="CSS/main.css">
    <!-- Font  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="col-md-8 p-5">
            <div class="card">
                               
                <div class="card-header d-flex justify-content-center">
                    <h2>Login Bodega</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" name ="txt_usuario" id="txt_usuario" placeholder="Usuario">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" name="txt_pass" id="txt_pass" placeholder="Contraseña">
                        </div>
                        <br>
                        <div class="form-group d-flex justify-content-center">
                            <input type="button" class="btn btn-success btn_iniciar" id="btn_iniciar" value="Iniciar Sesión">
                        </div>
                    </form>
                    <br>
                    <h5><?php echo $error;?></h5>     
                </div>
            </div>
        </div>
    </div>
</body>

</html>