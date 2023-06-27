function init(){

}

$(document).ready(function(){
    const urlParams = new URLSearchParams(window.location.search);
    const usu_correo = urlParams.get('email');

    $.post("../../controller/usuario.php?op=eliminar_x_correo", {usu_correo : usu_correo},function(data){
        console.log(data);
    });

});

init();