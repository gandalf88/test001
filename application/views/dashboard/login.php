<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="authentication-bg authentication-bg-pattern">
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="assets/images/iconfinder_ebook-e_learning-education-plant-online_4288578.png" alt="" height="100"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">
                                        Introdusca su usuario y contraseña para acceder al panel de control</p>
                                </div>
                                <h5 class="auth-title">Autenticación</h5>
                                <form action="formularioLogin" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Correo</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Contraseña</label>
                                        <input class="form-control" type="password" required=""  name="password" id="password" placeholder="Enter your password">
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit">Ingresar</button>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        <footer class="footer footer-alt">
            2020 &copy;Proyecto Tera Consulting <a href=""> Luis Jose Villamizar Rincon</a> 
        </footer>
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
    </body>
</html>