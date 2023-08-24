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
                <h1>Mnt. Producto</h1>
              

                <ol class="breadcrumb">
                    <li class="item"><a href="../home/"><i class='bx bx-home-alt'></i></a></li>

                    <li class="item">Mantenimiento de Producto</li>
                    <br>
                </ol>
                <button onclick="nuevo()" class="btn btn-primary btn-md" style="float: right;">Nuevo</button>
            </div>

            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Listado de Productos</h3>
                </div>



                <div class="card-body">
                <table id="producto_data" class="table display responsive nowrap">
    <thead>
        <tr>
            <th>Nro.</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody> 
    </tbody>
</table>

            </div>
            </div>
            <!-- End Breadcrumb Area -->

            <div class="flex-grow-1"></div>
            <?php

                require_once("mntmantenimiento.php") 
            ?>

            <?php
        require_once("../html/MainFooter.php");
    ?>

        </div>
        <!-- End Main Content Wrapper Area -->
        <?php
        require_once("../html/MainJs.php");
    ?>
    <script tyoe="text/javascript" src="mntproducto.js"></script>
    
    </body>
</html>

<?php

    }else{
        header("location:" .Conectar::ruta(). "../../index.php");
    }

?>