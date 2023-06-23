<?php

    require_once("../../config/conexion.php");

    if(isset($_SESSION["usu_id"])){

?>

<!doctype html>
<html lang="es">
    <head>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
        require_once("../html/MainHead.php");
    ?>
        <title>Fe y Alegría Del Perú - Correos Masivos</title>

        <link rel="icon" type="image/png" href="..\..\public\img\faviconfya.png">
    </head>

    <body>
    <?php
        require_once("../html/MainMenu.php");
    ?>

        <!-- Start Main Content Wrapper Area -->
        <div class="main-content d-flex flex-column">

        <?php
        require_once("../html/MainNavbar.php");
    ?>
            
            <!-- Breadcrumb Area -->
            <div class="breadcrumb-area">
                <h1>Enviar Correos</h1>

                <ol class="breadcrumb">
                    <li class="item"><a href="../home/"><i class='bx bx-home-alt'></i></a></li>

                    <li class="item">Enviar Correos</li>
                    <br>
                </ol>

                
            </div>

            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Enviar Correos</h3>
                    <br>
                    <button onclick="enviarCorreo()" class="btn btn-primary btn-md" id="btnenviar">Enviar Correo</button>
                </div>
                <script>
                    function enviarCorreo() {



swal({
    title: "HelpDesk!",
    text: "Registro Eliminado..",
    type: "success",
    confirmButtonClass: "btn-success"
});
}
                </script>
            </div>
            <!-- End Breadcrumb Area -->

            <div class="flex-grow-1"></div>

            <?php
        require_once("../html/MainFooter.php");
    ?>

        </div>
        <!-- End Main Content Wrapper Area -->
        <?php
        require_once("../html/MainJs.php");
    ?>
    <script tyoe="text/javascript" src="procenviarcorreo.js"></script>


    
    </body>
</html>

<?php

    }else{
        header("location:" .Conectar::ruta(). "../../index.php");
    }

?>