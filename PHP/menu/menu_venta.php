    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema Inventario - Venta</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="dropdown-item" aria-current="page" href="index.php?usuario=<?php echo $usuario; ?>">Bienvenido</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ventas
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li class="nav-item">
                                <a class="dropdown-item" aria-current="page" href="venta.php?usuario=<?php echo $usuario; ?>">Venta Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" aria-current="page" href="historial_venta.php?usuario=<?php echo $usuario; ?>">Historial Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" aria-current="page" href="historial_detalle.php?usuario=<?php echo $usuario; ?>">Historial Ventas Nulas</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex justify-content-left">
            <form class="d-flex">
                <button class="btn btn-success btn-salir" id="btn-salir" type="button">Logout</button>
            </form>
        </div>
    </nav>