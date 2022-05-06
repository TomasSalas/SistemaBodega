<?php
    include_once 'conexion.php';

    $query =  "SELECT * FROM usuarios WHERE md5(usuario) = '$usuario'";
    $result = $conexion->query($query);
    $data = $result->fetch_assoc();
    $usuario = $data['nombre_completo'];
        if(is_numeric($data['id_perfil'])){
            $perfil = intval($data['id_perfil']);
        }else{
            $perfil = 'exit';
        }
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