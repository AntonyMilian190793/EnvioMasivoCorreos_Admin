<?php

    require_once("../../config/conexion.php");

    if(isset($_SESSION["usu_id"])){

?>

<!doctype html>
<html lang="es">
    <head>


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
                <h1>Dashboard</h1>

                <ol class="breadcrumb">
                    <li class="item"><a href="dashboard-analytics.html"><i class='bx bx-home-alt'></i></a></li>

                    <li class="item">Dashboard</li>
                </ol>
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
    
    </body>
</html>

<?php

    }else{
        header("location:" .Conectar::ruta(). "../../index.php");
    }

?>