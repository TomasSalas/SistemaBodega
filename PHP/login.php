<?php
    include_once 'conexion.php';

    $usuario = $_POST['usuario'];
    $pass = $_POST['contraseña'];
    
    $contraseña = md5($pass);

    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND pass = '$contraseña'";
    $result = $conexion->query($query);
    
    if($result->num_rows > 0){  
        echo $data = 1;
    }else{
        echo $data = 2;
    }

?>