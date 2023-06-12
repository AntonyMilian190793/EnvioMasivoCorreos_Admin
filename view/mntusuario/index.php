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
                <h1>Mnt. Usuarios</h1>

                <ol class="breadcrumb">
                    <li class="item"><a href="../home/"><i class='bx bx-home-alt'></i></a></li>

                    <li class="item">Mantenimiento de Usuarios</li>
                </ol>
            </div>


                <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Basic Grid</h3>

                </div>



                <div class="card-body">
                <table id="myTable" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>
                </div>
            </div>
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
    <script tyoe="text/javascript" src="mntusuario.js"></script>
    
    </body>
</html>

<?php

    }else{
        header("location:" .Conectar::ruta(). "../../index.php");
    }

?>