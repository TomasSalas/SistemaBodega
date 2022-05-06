<?php
    include_once 'conexion.php';

    $query =  "SELECT * FROM usuarios WHERE md5(usuario) = '$usuario'";
    $result = $conexion->query($query);
    $data = $result->fetch_assoc();


    $perfil = $data['id_perfil'];
    $nom = $data['nombre_completo'];
    if($perfil == 1 ){
        include_once 'menu/menu_admin.php';
        
    }elseif($perfil == 2){
        include_once 'menu/menu_bodega.php';
        
    }elseif($perfil == 3){
        include_once 'menu/menu_venta.php';
        
    }else{
        header('Location: ./login.php?error=1');
    }
?>