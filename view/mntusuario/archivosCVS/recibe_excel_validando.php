<?php
require('config.php');

// Verificar si se subió un archivo
if (isset($_FILES['dataCliente']) && $_FILES['dataCliente']['error'] == 0) {
    $tipo       = $_FILES['dataCliente']['type'];
    $tamanio    = $_FILES['dataCliente']['size'];
    $archivotmp = $_FILES['dataCliente']['tmp_name'];

    // Verificar que el archivo no esté vacío
    if ($tamanio > 0) {
        $lineas = file($archivotmp);

        $i = 0;
        $cantidad_registros = count($lineas);
        $cantidad_regist_agregados = $cantidad_registros - 1;

        foreach ($lineas as $linea) {
            if ($i != 0) { // Saltar la primera línea si es un encabezado

                // Separar los datos usando el delimitador ;
                $datos = explode(",", $linea);

                // Asignar valores a las variables y manejar los posibles valores vacíos
                $usu_nom    = !empty($datos[0]) ? $datos[0] : '';
                $usu_correo = !empty($datos[1]) ? $datos[1] : '';
                $fech_crea  = !empty($datos[2]) ? $datos[2] : '';
                $rol_id     = !empty($datos[3]) ? $datos[3] : '';
                $est        = !empty($datos[4]) ? $datos[4] : '';

                // Verificar si el correo ya existe en la base de datos
                if (!empty($usu_correo)) {
                    $checkemail_duplicidad = "SELECT usu_correo FROM tm_usuario WHERE usu_correo='" . mysqli_real_escape_string($con, $usu_correo) . "'";
                    $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
                    $cant_duplicidad = mysqli_num_rows($ca_dupli);
                } else {
                    $cant_duplicidad = 0; // Si el correo está vacío, tratar como si no hubiera duplicados
                }

                // Si no existe duplicado, insertar el registro
                if ($cant_duplicidad == 0) {
                    $insertarData = "INSERT INTO tm_usuario (
                        usu_nom, usu_correo, fech_crea, rol_id, est
                    ) VALUES (
                        '" . mysqli_real_escape_string($con, $usu_nom) . "',
                        '" . mysqli_real_escape_string($con, $usu_correo) . "',
                        '" . mysqli_real_escape_string($con, $fech_crea) . "',
                        '" . mysqli_real_escape_string($con, $rol_id) . "',
                        '" . mysqli_real_escape_string($con, $est) . "'
                    )";
                    mysqli_query($con, $insertarData);
                }
                // Si existe duplicado, actualizar el registro
                else {
                    $updateData = "UPDATE tm_usuario SET 
                        usu_nom='" . mysqli_real_escape_string($con, $usu_nom) . "',
                        fech_crea='" . mysqli_real_escape_string($con, $fech_crea) . "',
                        rol_id='" . mysqli_real_escape_string($con, $rol_id) . "',
                        est='" . mysqli_real_escape_string($con, $est) . "'
                        WHERE usu_correo='" . mysqli_real_escape_string($con, $usu_correo) . "'
                    ";
                    mysqli_query($con, $updateData);
                }
            }
            $i++;
        }

        echo '<a href="http://localhost/EnvioMasivoCorreos_Admin/view/mntusuario/">Archivo subido con éxito</a>';
    } else {
        echo "El archivo está vacío.";
    }
} else {
    echo "Error al subir el archivo.";
}
