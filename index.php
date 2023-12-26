<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min-1.css" type="text/css">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min-1.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min-1.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min-1.css" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="index-1.html" class="d-block auth-logo">
                                        <img src="assets/picture/logo-sm-1.svg" alt="" height="28"> <span class="logo-txt">Minia</span>
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h5 class="mb-0">Welcome Back !</h5>
                                        <p class="text-muted mt-2">Sign in to continue to Minia.</p>
                                    </div>
                                    <form class="custom-form mt-4 pt-2">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Password</label>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="">
                                                        <a href="auth-recoverpw-1.html" class="text-muted">Forgot password?</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </form>

                                    <div class="mt-5 text-center">
                                        <p class="text-muted mb-0">Don't have an account ? <a href="auth-register-1.html" class="text-primary fw-semibold"> Signup now </a> </p>
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

                </div>

                <?php require_once("view/html/carrusel.php") ?>

            </div>

        </div>

    </div>


    <!-- JAVASCRIPT -->
    <script src="assets/js/jquery.min-1.js"></script>
    <script src="assets/js/bootstrap.bundle.min-1.js"></script>
    <script src="assets/js/metisMenu.min-1.js"></script>
    <script src="assets/js/simplebar.min-1.js"></script>
    <script src="assets/js/waves.min-1.js"></script>
    <script src="assets/js/feather.min-1.js"></script>
    <!-- pace js -->
    <script src="assets/js/pace.min-1.js"></script>
    <!-- password addon init -->
    <script src="assets/js/pass-addon.init-1.js"></script>

</body>

</html>