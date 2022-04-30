var table_reload;
var codigo = "";

login = function(){
    var username = $("#txt_usuario").val();
    var password = $("#txt_pass").val();
    if(username == "" && password == ""){
        Swal.fire(
            'Ingrese Datos',
            'Los campos no pueden estar vacios!',
            'error'
        );
    }else{
        if(username == 'admin' && password == 'admin'){
            Swal.fire(
                'Ingreso Correcto',
                'Bienvenido al sistema',
                'success'
            ).then(function(){  window.location.href = "guardar.php"; });
        }
        else{
            Swal.fire(
                'Ingreso Incorrecto',
                'Credenciales incorrectas',
                'warning'
            );
        }
    }
};
function selected(){
    table_reload = $('#table_listar').DataTable({
        "language": {
            search: "Buscar",
            info: "Mostrando _START_ to _END_ of _TOTAL_ Registro",
        },
    });
    $('#table_listar tbody').on('click', 'tr', function() {
        $('tr').removeClass('selected');
        this.classList.toggle("selected");  });
};
function colorear (){
    $('#table_listar tbody').on('click', 'tr', function() {
        $('tr').removeClass('selected');
        this.classList.toggle("selected");
        var data = table_reload.row(this).data();
        codigo = data[0];
        cargar_editar(codigo);
    });
}
function cargar_editar() {
    $.ajax({
        url: "PHP/cargar_edit.php",
        type: "POST",
        dataType: "JSON",
        data: {codigo:codigo},
        success: function(data){
            document.getElementById("txt_edit_cod").value = data.codigo;
            document.getElementById("txt_edit_nom").value = data.nombre;
            document.getElementById("txt_edit_cant").value = data.cantidad;
            document.getElementById("txt_edit_precio_compra").value = data.precio_compra;
            document.getElementById("txt_edit_precio_venta").value = data.precio_venta;
            document.getElementById("txt_edit_coment").value = data.comentario;
        }
    })
};
function guardar() {
    var codigo = document.getElementById("txt_codigo").value;
    var nombre = document.getElementById("txt_nombre").value;
    var cantidad = document.getElementById("txt_cantidad").value;
    var precio_compra = document.getElementById("txt_precio_compra").value;
    var precio_venta = document.getElementById("txt_precio_venta").value;
    var comentario = document.getElementById("txt_comentario").value
    $.ajax({
        url: "PHP/create.php",
        type: "POST",
        data: {
            codigo: codigo,
            nombre: nombre,
            cantidad: cantidad,
            precio_compra: precio_compra,
            precio_venta: precio_venta,
            comentario: comentario
        }, 
        success: function(data){
            if(data == 1){
                Swal.fire(
                    'Ingreso Correcto',
                    'Productos Registrados Exitosamente',
                    'success'
                );
                limpiar();
            }else{
                Swal.fire(
                    'Ingreso Incorrecto',
                    'Error al registrar productos',
                    'error'
                );
                limpiar();
            }
        }
    });
}
function limpiar(){
    document.getElementById("txt_codigo").value = "";
    document.getElementById("txt_nombre").value = "";
    document.getElementById("txt_cantidad").value = "";
    document.getElementById("txt_precio_compra").value = "";
    document.getElementById("txt_precio_venta").value = "";
    document.getElementById("txt_comentario").value = "";
}
function editar(){
    var codigo = document.getElementById("txt_edit_cod").value;
    var nombre = document.getElementById("txt_edit_nom").value;
    var cantidad = document.getElementById("txt_edit_cant").value;
    var precio_compra = document.getElementById("txt_edit_precio_compra").value; 
    var precio_venta = document.getElementById("txt_edit_precio_venta").value;
    var comentario = document.getElementById("txt_edit_coment").value;
    $.ajax({    
        url: "PHP/edit.php",
        type: "POST",
        data: {
            codigo: codigo,
            nombre: nombre,
            cantidad: cantidad,
            precio_compra: precio_compra,
            precio_venta: precio_venta,
            comentario: comentario
        },
        success: function(data){
            if(data == 1){
                Swal.fire(
                    'Edición Correcta',
                    'Productos Editados Exitosamente',
                    'success'
                ).then(function(){  window.location.reload() });
            }else{
                Swal.fire(
                    'Edición Incorrecto',
                    'Error al editar productos',
                    'error'
                ).then(function(){  window.location.reload() });
                
            }
        }
    });
}
$(document).ready(function(){
    selected();
    
    $(".btn_iniciar").on("click",function(){
        login();
    });

    $(".btn_editar").on("click",function(){
        colorear();
    });

    $(".btn_guardar").on("click",function(){
        guardar();
    });

    $(".btn_editar_bd").on("click",function(){
        editar();
    });
});

