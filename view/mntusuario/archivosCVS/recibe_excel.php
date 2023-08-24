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

        $insertar = "INSERT INTO tm_usuario( 
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
        mysqli_query($con, $insertar);
    }

    echo '<div>' . $i . "). " . $linea . '</div>';
    $i++;
}


echo '<p style="text-aling:center; color:#333;">Total de Registros: ' . $cantidad_regist_agregados . '</p>';

?>

<a href="http://localhost/EnvioMasivoCorreos_Admin/index.php">Archivo subido con éxito</a>