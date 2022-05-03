var table_reload;
var codigo = "";

function selected() {
    table_reload = $('#table_listar').DataTable({
        "language": {
            search: "Buscar",
            info: "Mostrando _START_ to _END_ of _TOTAL_ Registro",
        },
    });
};
function colorear() {
    $('#table_listar tbody').on('click', 'tr', function () {
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
        data: { codigo: codigo },
        success: function (data) {
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
        success: function (data) {
            if (data == 1) {
                Swal.fire(
                    'Ingreso Correcto',
                    'Productos Registrados Exitosamente',
                    'success'
                );
                limpiar();
            } else {
                Swal.fire(
                    'Ingreso Incorrecto',
                    'Error al registrar productos',
                    'error'
                );
                limpiar();
            }
        }
    });
};
function limpiar() {
    document.getElementById("txt_codigo").value = "";
    document.getElementById("txt_nombre").value = "";
    document.getElementById("txt_cantidad").value = "";
    document.getElementById("txt_precio_compra").value = "";
    document.getElementById("txt_precio_venta").value = "";
    document.getElementById("txt_comentario").value = "";
};
function editar() {
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
        success: function (data) {
            if (data == 1) {
                Swal.fire(
                    'Edición Correcta',
                    'Productos Editados Exitosamente',
                    'success'
                ).then(function () { window.location.reload() });
            } else {
                Swal.fire(
                    'Edición Incorrecto',
                    'Error al editar productos',
                    'error'
                ).then(function () { window.location.reload() });

            }
        }
    });
};
function eliminar() {
    var codigo = $('#btn_eliminar').data("id");
    $.ajax({
        url: "PHP/delete.php",
        type: "POST",
        data: { codigo: codigo },
        success: function (data) {
            if (data == 1) {
                Swal.fire(
                    'Eliminación Correcta',
                    'Productos Eliminados Exitosamente',
                    'success'
                ).then(function () { window.location.reload() });
            } else {
                Swal.fire(
                    'Eliminación Incorrecta',
                    'Error al eliminar productos',
                    'error'
                ).then(function () { window.location.reload() });
            }
        }
    });
};
function listar() {
    var codigo_venta = document.getElementById("txt_codigo_venta").value;
    var num_boleta = document.getElementById("txt_venta").value;
    $.ajax({
        url: "PHP/listar_venta.php",
        type: "POST",
        data: { 
            codigo_venta: codigo_venta,
            num_boleta: num_boleta 
        },
        success: function (data) {
            $("#table_body").html(data);
            document.getElementById("txt_codigo_venta").value = "";
        }
    });
    
};
function codigo_venta(){
    
    var numero_venta = Math.floor(Math.random() * 999999999999) + 1;
    document.getElementById("txt_venta").value = numero_venta;
};
function liberar_venta(){
    var codigo_venta = document.getElementById("txt_codigo_venta").value;
    var num_boleta = document.getElementById("txt_venta").value;
    $.ajax({
        url: "PHP/liberar_venta.php",
        type: "POST",
        data: { codigo_venta: codigo_venta , num_boleta : num_boleta},
        success: function (data) {
            if(data == 1){
                Swal.fire(
                    'Liberación Correcta',
                    'Venta Liberada Exitosamente',
                    'success'
                ).then(function () { 
                    window.location.reload();
                });
            }
        }
    });
};
function verificar_codigo(){
    var codigo = document.getElementById("txt_codigo_venta").value;
    $.ajax({
        url: "PHP/verificar_codigo.php",
        type: "POST",
        data: { codigo: codigo },
        success: function (data) {
            if(data == 1){
                listar();
            }
            else{
                Swal.fire(
                    'Código Incorrecto',
                    'Código no existe',
                    'error'
                );
                document.getElementById("txt_codigo_venta").value = "";
            }
        }
    });
}
$(document).ready(function () {
    selected();
    codigo_venta();
    $(document).keypress(function(e) {
        if(e.which == 13) {
            listar();
        }
    });
    $(".btn_liberar_venta").on("click", function () {
        liberar_venta();
    });

    $(".btn_prueba").on("click", function () {
        
    });

    $(".btn_buscar_venta").on("click", function () {
        verificar_codigo();
    });

    $(".btn_editar").on("click", function () {
        colorear();
    });

    $(".btn_guardar").on("click", function () {
        guardar();
    });

    $(".btn_editar_bd").on("click", function () {
        editar();
    });

    $(".btn_eliminar").on("click", function () {
        eliminar();
    });

    $(".btn_pagar").on("click", function () {
        alert("OK");
    });
});
