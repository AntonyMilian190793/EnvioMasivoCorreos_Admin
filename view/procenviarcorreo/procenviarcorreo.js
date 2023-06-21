function enviarCorreo(){

    $.post("../../controller/email.php?op=enviarCorreo",function(data){
        console.log(data);
    });
}