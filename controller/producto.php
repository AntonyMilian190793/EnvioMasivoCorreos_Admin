<?php


require_once("../config/conexion.php");
require_once("../models/Producto.php");
$producto = new Producto();

switch($_GET["op"]){

    case "guardaryeditar":
        if(empty($_POST["prod_id"])){
            $producto->insert_producto($_POST["prod_nom"],$_POST["prod_oficial"],$_POST["prod_soles"],$_POST["prod_usd"],$_POST["prod_plazo"],$_POST["fech_inicio"],$_POST["fech_fin"],$_POST["prod_monto"],$_POST["prod_ie"]);
        }else{
            $producto->update_producto($_POST["prod_id"],$_POST["prod_nom"],$_POST["prod_oficial"],$_POST["prod_soles"],$_POST["prod_usd"],$_POST["prod_plazo"],$_POST["fech_inicio"],$_POST["fech_fin"],$_POST["prod_monto"],$_POST["prod_ie"]);
        }
        break;

    case "listar":
        $datos =$producto->get_producto();
        $data = array();
        foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["prod_nom"];
            $sub_array[] = $row["prod_oficial"];
            $sub_array[] = $row["prod_soles"];
            $sub_array[] = $row["prod_usd"];
            $sub_array[] = $row["prod_plazo"];
            $sub_array[] = $row["fech_inicio"];
            $sub_array[] = $row["fech_fin"];
            $sub_array[] = $row["prod_monto"];
            $sub_array[] = $row["prod_ie"];
            if( $row["est"] == 1){
                $sub_array[] = '<span class="badge badge-pill badge-primary">Activo</span>';
            }else{
                $sub_array[] = '<span class="badge badge-pill badge-danger">No Vigente</span>';
            }
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
                $output["prod_oficial"] = $row["prod_oficial"];
                $output["prod_soles"] = $row["prod_soles"];
                $output["prod_usd"] = $row["prod_usd"];
                $output["prod_plazo"] = $row["prod_plazo"];
                $output["fech_inicio"] = $row["fech_inicio"];
                $output["fech_fin"] = $row["fech_fin"];
                $output["prod_monto"] = $row["prod_monto"];
                $output["prod_ie"] = $row["prod_ie"];

            }
            echo json_encode($output);
        }
        break;  
}




?>