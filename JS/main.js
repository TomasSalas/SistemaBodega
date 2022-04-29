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

var table_reload;
var codigo = "";

function selected(){
    table_reload = $('#table_listar').DataTable({
        paging: false,
        destroy: true,
        "language": {
            search: "Buscar",
            info: "Mostrando _START_ to _END_ of _TOTAL_ Registro",
        },
        
    });
};

function colorear (){
    $('#table_listar tbody').on('click', 'tr', function() {
        $('tr').removeClass('selected');
        this.classList.toggle("selected");
        var data = table_reload.row(this).data();
        codigo = data[0];
        editar(codigo);
    });
}

function editar() {
    $.ajax({
        url: "PHP/cargar_edit.php",
        type: "POST",
        data: {codigo:codigo},
        success: function(data){
            document.getElementById("txt_edit_cod").value = data;
        }
    })
};


$(document).ready(function(){
    selected();
    
    $(".btn_iniciar").on("click",function(){
        login();
    });

    $(".btn_editar").on("click",function(){
        colorear();
    });
});

