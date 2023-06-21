<?php


    require_once ("../models/Email.php");
    $email = new Email();

    switch ($_GET["op"]){
        
        case "enviarCorreo":
            $datos=$email->enviar_correo();
            echo json_encode($datos);    
            break;

    }


?>