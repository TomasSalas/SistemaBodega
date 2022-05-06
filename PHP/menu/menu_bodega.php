<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bodega</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?usuario=<?php echo $usuario;?>">Bienvenido</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="guardar.php?usuario=<?php echo $usuario;?>">Guardar Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="listar.php?usuario=<?php echo $usuario; ?>">Listar Productos</a>
                    </li>
                </ul>

                <form class="d-flex">
                    <button class="btn btn-success btn-salir" id="btn-salir" type="button">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </nav>