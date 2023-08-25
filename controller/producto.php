<?php


require_once("../config/conexion.php");
require_once("../models/Producto.php");
$producto = new Producto();

switch($_GET["op"]){

    case "guardaryeditar":
        if(empty($_POST["prod_id"])){
            $producto->insert_producto($_POST["prod_nom"],$_POST["prod_url"],$_POST["prod_img"],$_POST["prod_descrip"]);
        }else{
            $producto->update_producto($_POST["prod_id"],$_POST["prod_nom"],$_POST["prod_url"],$_POST["prod_img"],$_POST["prod_descrip"]);
        }
        break;

    case "listar":
        $datos =$producto->get_producto();
        $data = array();
        foreach($datos as $key => $row){
            $sub_array = array();
            $sub_array[] = ($key+1);
            $sub_array[] = $row["prod_nom"];
            $sub_array[] = $row["prod_descrip"];
            $sub_array[] = '<button type="button" onClick="editar('.$row["prod_id"].')" id="'.$row["prod_id"].'" class="btn btn-outline-success"><i class="bx bx-edit"></i></button></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["prod_id"].')" id="'.$row["prod_id"].'" class="btn btn-outline-danger"><i class="bx bx-trash"></i></button></button>';
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

        $producto->delete_producto($_POST["prod_id"]);
        break;


      case "mostrar" :
        $datos=$producto->get_producto_x_id($_POST["prod_id"]);

        if(is_array($datos) == true AND count($datos)<>0){
            foreach($datos as $row){
                $output["prod_id"] = $row["prod_id"];
                $output["prod_nom"] = $row["prod_nom"];
                $output["prod_url"] = $row["prod_url"];
                $output["prod_img"] = $row["prod_img"];
                $output["prod_descrip"] = $row["prod_descrip"];
            }
            echo json_encode($output);
        }
        break;  
}




?>