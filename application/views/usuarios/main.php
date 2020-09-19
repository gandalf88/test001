<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">  
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Inicio</a></li>
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Usuarios</a></li> 
                            </ol>
                        </div>
                        <h4 class="page-title"><?php echo $title;?></h4> 
                        
                        <button type="button" class=" margin_pizzavzla btn btn-success waves-effect waves-light" id="addUser"
                             data-toggle="modal" data-target="#con-close-modal">Agregar usuario</button>

                        <table id="usuarios_id" class="listdata table dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Nombres</th>
                                    <th class="text-nowrap">Apellidos</th>
                                    <th class="text-nowrap">Cédula</th>
                                    <th class="text-nowrap">Correo</th>
                                    <th class="text-nowrap">Teléfono</th>
                                    <th class="text-nowrap">Tipo de usuario</th>
                                    <th class="text-nowrap">Acción</th>
                                </tr>
                            </thead>                            
                            <tbody>
                            </tbody>
                            </table>
                      </div>
                </div>
            </div>     
            <!-- end page title --> 
    </div> <!-- container -->
</div> <!-- content -->
<!-- Footer Start -->