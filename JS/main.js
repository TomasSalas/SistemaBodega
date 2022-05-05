var codigo = "";
function table_body() {
    $("#buscar").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table_listar tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
}
function cargar_editar(codigo) {
    alert(codigo);
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
    var comentario = document.getElementById("txt_comentario").value;
    
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
function eliminar(codigo) {
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
            if(data == 2){
                listar();
            }
            else if(data == 1){
                Swal.fire(
                    'Código Incorrecto',
                    'Código no existe o Producto Sin Stock ',
                    'error'
                );
                document.getElementById("txt_codigo_venta").value = "";
            }
        }
    });
}
function generar_pago(){
    var num_boleta = document.getElementById("txt_numero_boleta_modal").value;
    var monto_total = document.getElementById("txt_monto_total_modal").value;
    var tipo_pago = document.getElementById("txt_tipo_pago_modal").value;

    $.ajax({
        url: "PHP/generar_venta.php",
        type: "POST",
        data: {
            num_boleta: num_boleta,
            monto_total: monto_total,
            tipo_pago: tipo_pago
        },
        success: function (data) {
            if(data == 1){
                Swal.fire(
                    'Pago Correcto',
                    'Pago ingresado exitosamente',
                    'success'
                ).then(function () { window.location.reload() });
            }
            else{
                Swal.fire(
                    'Pago Incorrecto',
                    'Pago no ingresado',
                    'error'
                );
            }
        }
    });
}
function enterkey(){
    var input = document.getElementById("txt_codigo_venta");
    input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        verificar_codigo();
    }
});
}
function validar(){
    var codigo = document.getElementById("txt_codigo").value;
    var nombre = document.getElementById("txt_nombre").value;
    var cantidad = document.getElementById("txt_cantidad").value;
    var precio_compra = document.getElementById("txt_precio_compra").value;
    var precio_venta = document.getElementById("txt_precio_venta").value;
    var comentario = document.getElementById("txt_comentario").value;

    if(codigo != ""){
        
    }else{
        Swal.fire(
            'Campos Vacios',
            'Por favor llene todos los campos',
            'error'
        );
    }

}
$(document).ready(function () {
    
    $(".btn_generar_cobro").on("click", function () {
        generar_pago();
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
        cargar_editar();
    });

    $(".btn_guardar").on("click", function (e) {
        e.preventDefault();
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
