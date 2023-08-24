<?php
require('config.php');
$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);

        $usu_nom           = !empty($datos[0])  ? ($datos[0]) : '';
        $usu_correo        = !empty($datos[1])  ? ($datos[1]) : '';
        $fech_crea         = !empty($datos[2])  ? ($datos[2]) : '';
        $rol_id            = !empty($datos[3])  ? ($datos[3]) : '';
        $est               = !empty($datos[4])  ? ($datos[4]) : '';


        if (!empty($usu_correo)) {
            $checkemail_duplicidad = ("SELECT usu_correo FROM tm_usuario WHERE usu_correo='" . ($usu_correo) . "' ");
            $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }

        //No existe Registros Duplicados
        if ($cant_duplicidad == 0) {

            $insertarData = "INSERT INTO tm_usuario(
    usu_nom,
    usu_correo, 
    fech_crea,
    rol_id,
    est
) VALUES(
    '$usu_nom',
    '$usu_correo',
    '$fech_crea',
    '$rol_id',
    '$est'
)";
            mysqli_query($con, $insertarData);
        }
        /**Caso Contrario actualizo el o los Registros ya existentes*/
        else {
            $updateData =  ("UPDATE tm_usuario SET 
        usu_nom='" . $usu_nom . "',
        usu_correo='" . $usu_correo . "',
        fech_crea='" . $fech_crea . "',
        rol_id='" . $rol_id . "',
        est='" . $est . "',
        WHERE usu_correo='" . $usu_correo . "'
    ");
            $result_update = mysqli_query($con, $updateData);
        }
    }

    $i++;
}

?>

<a href="http://localhost/EnvioMasivoCorreos_Admin/view/mntusuario/">Archivo subido con éxito</a>