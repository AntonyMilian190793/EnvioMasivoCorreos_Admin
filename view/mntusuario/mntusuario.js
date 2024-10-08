function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);
    });
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            $('#usuario_data').DataTable().ajax.reload();
            $('#mntmantenimiento').modal('hide');
            Swal.fire({
                title: 'Correcto!',
                text: 'Se regsitró corectamente!',
                icon:'success',
                confirmButtonText: 'Aceptar'
            })
        }
    });
}

$(document).ready(function() {
    $('#usuario_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax": {
            url: "../../controller/usuario.php?op=listar",
            type: "post",
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 30,
        "order": [[ 0, "asc" ]], // Ordenar por la primera columna en orden ascendente
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
        }
    });
});


function eliminar(usu_id){

    Swal.fire({
        title: 'Desactivar?',
        text: "Está seguro de desactivar el registro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/usuario.php?op=eliminar", {usu_id:usu_id}, function(data){
                $('#usuario_data').DataTable().ajax.reload();
            });
            
          Swal.fire(
            'Eliminado!',
            'Eliminado correctamente!',
            'success'
          )
        }
      })
}

function activar(usu_id) {
    Swal.fire({
        title: '¿Está seguro de activar este Usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Sí, activar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/usuario.php?op=activar", { usu_id: usu_id })
            .done(function(response) {
                try {
                    const data = JSON.parse(response);
                    if (data.success) {
                        Swal.fire(
                            'Activado!',
                            'El Usuario ha sido activado correctamente.',
                            'success'
                        );
                    } else {
                        Swal.fire(
                            'Activado!',
                            'No se pudo activar el usuario.',
                            'error'
                        );
                    }
                } catch (e) {
                    Swal.fire(
                        'Activado!',
                        'El Usuario ha sido activado correctamente.',
                        'success'
                    );
                }
                $('#usuario_data').DataTable().ajax.reload();
            })
            .fail(function() {
                Swal.fire(
                    'Error!',
                    'Hubo un problema con la solicitud.',
                    'error'
                );
            });
        }
    });
}

function editar(usu_id){
    $('#lbltitulo').html("Editar Registro");
    $.post("../../controller/usuario.php?op=mostrar",{usu_id:usu_id},function(data){
        var datos = JSON.parse(data);
        $('#usu_id').val(datos.usu_id);
        $('#usu_nom').val(datos.usu_nom);
        $('#usu_correo').val(datos.usu_correo);
        $('#mntmantenimiento').modal('show');
    });
}

function nuevo(){
    $('#lbltitulo').html("Nuevo Registro");
    $('usu_id').val('');
    $('#usuario_form')[0].reset();
    $('#mntmantenimiento').modal('show');
}

init();