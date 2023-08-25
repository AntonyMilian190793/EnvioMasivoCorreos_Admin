<?php

require_once("../../config/conexion.php");

if (isset($_SESSION["usu_id"])) {

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
                    <br>
                </ol>
                <button onclick="nuevo()" class="btn btn-primary btn-md">Nuevo</button>
            </div>

            <div class="breadcrumb-area">
                <h1>Arch. CSV</h1>

                <ol class="breadcrumb">
                    <li class="item"><a href="../home/"><i class='bx bx-home-alt'></i></a></li>

                    <li class="item">Subir archivo CSV</li>
                    <br>
                </ol>
                <form action="archivosCVS/recibe_excel_validando.php" method="POST" enctype="multipart/form-data" />
                <input type="file" name="dataCliente" id="file-input" class="file-input__input" />
                <label class="file-input__label" for="file-input">
                    <button class="btn btn-primary btn-md" type="submit" name="subir" class="btn-enviar" value="Subir Excel">Subir CSV</button>

                    </form>
            </div>


            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Listado de Usuarios</h3>

                </div>



                <div class="card-body">
                    <table id="usuario_data" class="table">
                        <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell" style="width: 8%;">Nro.</th>
                                <th class="d-none d-sm-table-cell" style="width: 30%;">Nombres y Apellidos / Empresa</th>
                                <th class="d-none d-sm-table-cell" style="width: 30%;">Correo Electrónico</th>
                                <th class="d-none d-sm-table-cell" style="width: 8%;">Estado</th>
                                <th class="d-none d-sm-table-cell" style="width: 8%;">Editar</th>
                                <th class="d-none d-sm-table-cell" style="width: 8%;">Eliminar</th>
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
            require_once("../html/MainFooter.php");
            ?>
            <?php

            require_once("mntmantenimiento.php")
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

} else {
    header("location:" . Conectar::ruta() . "../../index.php");
}

?>