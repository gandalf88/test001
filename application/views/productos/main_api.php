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
                                <!-- <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Dashboard</li> -->
                            </ol>
                        </div>
                        <h4 class="page-title"><?php echo $search_hacienda;?></h4>
                        <div class="form-group">
           
                            <input type="text" class="form-control parsley-error" name="api_hacienda" 
                                id="api_hacienda" data-parsley-id="5" 
                                aria-describedby="parsley-id-5" placeholder="Escriba Aqui">
                            <br>
                            <button type="button" class=" btn btn-success waves-effect waves-light" id="buscadorAPi">Buscar</button>
                                
                        </div>
                        <div class="card">
                                    <div class="card-body">
                                        <div class="card-widgets">
                                            <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                            <a data-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                                            <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                        </div>
                                        <h4 class="header-title mb-0">Resultados</h4>

                                        <div id="cardCollpase3" class="collapse pt-3 show">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                Número de Documento: <label id="num"></label>
                                            </li>
                                            <li class="list-group-item">
                                                Ientificacion: <label id="idem"></label>
                                                </li>
                                            <li class="list-group-item">
                                                Fecha de Emision:  <label id="fecha_emi"></label>
                                            </li>
                                            <li class="list-group-item">
                                                Fecha de Vencimiento: <label id="fecha_ven"></label>
                                            </li>
                                            <li class="list-group-item">
                                                Tipo de Documento: <br> <label id="tipo"></label>
                                            </li>
                                            <li class="list-group-item">
                                                Nombre de Institucion: <label id="ins"></label>
                                            </li>
                                            <li class="list-group-item">
                                               porcentajeExoneracion: <label id="exo"></label>
                                            </li>
                                        </ul>
                                        </div> <!-- collapsed end -->
                                    </div> <!-- end card-body -->
                                </div>

                    </div>
                </div>
            </div>     
            <!-- end page title --> 
    </div> <!-- container -->
</div> <!-- content -->
<!-- Footer Start -->