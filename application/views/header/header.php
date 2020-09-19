<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Bienvenido al Sistema!!!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="admin " 
			name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <?php echo queue_css($css); ?>
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <a href="http://localhost/test001/logout" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Salir</span>
                        </a>
                    </li>
                </ul>
                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="assets/images/iconfinder_ebook-e_learning-education-plant-online_4288578.png" alt="" height="80">
                            <!-- <span class="logo-lg-text-light">Upvex</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="assets/images/logo-sm.png" alt="" height="28">
                        </span>
                    </a>
                </div>
            </div>
            <!-- end Topbar -->
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">
                <div class="slimscroll-menu">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Menú del Sistema</li>
                               <li>
                                <a href="/test001/adm_api">
                                    <i class="fe-users"></i>
                                    <span> API buscador </span>
                                </a>
                            </li>
						
							<li>
                                <a href="/test001/adm_productos">
                                    <i class="fe-box"></i>
                                    <span> Productos </span>
                                </a>
                            </li>
							
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->