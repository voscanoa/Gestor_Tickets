<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["user_id"])) {
?>
    <!doctype html>
    <html lang="es">

    <head>
        <title>AnderCode | Nuevo Ticket</title>
        <?php require_once("../html/head.php") ?>
    </head>

    <body>

        <div id="layout-wrapper">

            <?php require_once("../html/header.php") ?>
            <?php require_once("../html/menu.php") ?>

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Nuevo Ticket</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                            <li class="breadcrumb-item active">Nuevo Ticket</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Ingrese toda la información requerida.</h4>
                                        <p class="card-title-desc"><code>(*)</code> Datos obligatorios. </p>
                                    </div>

                                    <!--  -->
                                    <div class="card-body p-4">
                                        <form method="post" id="ticket_form">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="form-label" class="form-label">Categoría del ticket <code>*</code></label>
                                                        <select class="form-select" name="category_id" id="category_id" placeholder="Seleccionar" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label class="form-label" for="form-label">Nombre del ticket <code>*</code></label>
                                                        <input class="form-control" type="text" id="ticket_title" name="ticket_title" placeholder="Ingrese nombre" require>
                                                    </div>
                                                </div>
                                                <!-- Lado Izquierdo -->
                                                <div class="col-lg-3">
                                                    <div class="mb-4">
                                                        <label class="form-label" for="form-label">Codigo Anydesk del equipo <code>*</code></label>
                                                        <input class="form-control" type="number" id="ticket_anydesk" name="ticket_anydesk" placeholder="000 000 000" require>
                                                    </div>
                                                </div>
                                                <!-- descripcion completo -->
                                                <div class="col-lg-12">
                                                    <div class="mb-4">
                                                        <label class="form-label" for="form-label">Descripción del ticket <code>*</code></label>
                                                        <textarea class="form-control" type="text" rows=3 value="" id="ticket_description" name="ticket_description" placeholder="Ingrese descripción" require></textarea>
                                                    </div>
                                                </div>
                                                <!-- Upload -->
                                                <div class="col-lg-12">

                                                    <div class="dropzone">
                                                        <div class="dz-default dz-message">
                                                            <button class="dz-button" type="button">
                                                                <img src="../../assets/icons/upload.svg" alt="">
                                                            </button>
                                                            <div class="dz-message" data-dz-message>
                                                                <h4 class="card-title"> Suelta tus archivos aquí o navega
                                                                </h4>
                                                                <p class="card-title-desc">Máx. Cantidad de imagenes: <strong>3</strong> <br> Máx. Tamaño de imagen: <strong>2 MB</strong>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class=" d-flex flex-wrap gap-2 mt-4">
                                                    <button type="button" id="btnlimpiar" class="btn btn-secondary waves-effect waves-light">Limpiar</button>
                                                    <button type="submit" id="btnguardar" class="btn btn-primary waves-effect waves-light">Crear</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div><!-- end row -->
                </div> <!-- container-fluid -->
            </div> <!-- page-conten -->
            <?php require_once("../html/footer.php") ?>
        </div> <!-- end main content-->

        </div> <!-- end layout-wrapper -->

        <?php require_once("../html/sidebar.php") ?>
        <div class="rightbar-overlay"></div>
        <?php require_once("../html/js.php") ?>

        <script type="text/javascript" src="nuevoticket.js"></script>

    </body>

    </html>
<?php
} else {
    header("Location:" . Conectar::ruta() . "index.php");
}
?>