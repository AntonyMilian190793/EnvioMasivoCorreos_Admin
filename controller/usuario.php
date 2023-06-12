<?php


require_once("../config/conexion.php");
require_once("../models/Usuario.php");
$usuario = new Usuario();

switch($_GET["op"]){
    case "listar":
        $datos =$usuario->get_usuario();
        $data = array();
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["usu_correo"];
                
            if( $row["est"] == 1){
                $sub_array[] = '<span class="badge badge-pill badge-primary">Suscrito</span>';
            }else{
                $sub_array[] = '<span class="badge badge-pill badge-danger">No suscrito</span>';
            }

            if( $row["est"] == 1){
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["usu_id"].')" id="'.$row["usu_id"].'" class="btn btn-outline-danger"><i class="bx bx-trash"></i></button></button>';
            }else{
                $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger"><i class="bx bx-trash"></i></button></button>';
            }
           
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" =>count($datos),
            "iTotalDisplayRecords" =>count($datos),
            "aaData" =>$data);
        
        echo json_encode($results);
    break;

    case "eliminar" :

        $usuario->delete_usuario($_POST["usu_id"]);
        break;
}



?>