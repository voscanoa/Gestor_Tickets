<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <title>Register | Minia - Minimal Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">

    <!-- Sweet Alert-->
    <link href="../../assets//css/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <!-- preloader css -->
    <link rel="stylesheet" href="../../assets/css/preloader.min.css" type="text/css">
    <!-- Bootstrap Css -->
    <link href="../../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="../../assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="../../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-3 mb-md-4 text-center">
                                    <a href="index.html" class="d-block auth-logo">
                                        <img src="../../assets/picture/logo-sm.svg" alt="" height="38"> <span class="logo-txt">Minia</span>
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h5 class="mb-0">Registrar Cuenta</h5>
                                        <p class="text-muted mt-1">Get your free Minia account now.</p>
                                    </div>

                                    <form id="mnt_form" class="needs-validation custom-form mt-4 pt-2" novalidate="" action="index.html">
                                        <div class="mb-3">
                                            <label for="user_email" class="form-label">Correo Electronico</label>
                                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="hola@electroperu.com.pe" required="">
                                            <div class="validation-error text-danger">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="user_name" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Paulino" required="">
                                            <div class="validation-error text-danger">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="user_password" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Ingrese contraseña" required="">
                                            <div class="validation-error text-danger">
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="user_password_confir" class="form-label">Confirmar Contraseña</label>
                                            <input type="password" class="form-control" id="user_password_confir" name="user_password_confir" placeholder="Ingrese contraseña" required="">
                                            <div class="validation-error text-danger">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <p class="mb-0">Acepto los <a href="#" class="text-primary">Términos & Condicones</a></p>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Registrarse</button>
                                        </div>
                                    </form>
                                    <!-- Esto nos lleva al login inicial -->
                                    <div class="mt-4 text-center">
                                        <p class="text-muted mb-0">Ya tienes una cuenta? <a href="../../index.php" class="text-primary fw-semibold"> Acceder </a> </p>
                                    </div>
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script> Minia . Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <?php require_once("../html/carrusel.php") ?>
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>


    <!-- JAVASCRIPT -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/metisMenu.min.js"></script>
    <script src="../../assets/js/simplebar.min.js"></script>
    <script src="../../assets/js/waves.min.js"></script>
    <script src="../../assets/js/feather.min.js"></script>
    <!-- pace js -->
    <script src="../../assets/js/pace.min.js"></script>
    <!-- Sweet Alerts js -->
    <script src="../../assets/js/sweetalert2.min.js"></script>
    <!-- validation init -->
    <!-- <script src="../../assets/js/validation.init.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/validator/13.6.0/validator.min.js"></script>

    <script type="text/javascript" src="registro.js"></script>

</body>

</html>