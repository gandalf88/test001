<div id="con-close-modal" class="modal fade" tabindex="-1" 
    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" 
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tituloModal"></h4>
                <button type="button" class="close" 
                    data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form_user" type="POST" data-parsley-validate>
            <div class="modal-body p-4">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">

                            <label for="naturaleza" class="control-label">Naturaleza Producto</label>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="naturalezaRadio1" name="naturalezaRadio" class="custom-control-input">
                                <label class="custom-control-label" for="naturalezaRadio1">Bien</label>
                            </div>

                            <div class="custom-control custom-radio mt-1">
                                <input type="radio" id="naturalezaRadio2" name="naturalezaRadio" class="custom-control-input">
                                <label class="custom-control-label" for="naturalezaRadio2">Servicio</label>
                            </div>
                                     
                            <input type="text" id="idUsuario" value="" class="oculto">

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">

                            <label for="unidad" class="control-label">Unidad Medida</label>

                            <input type="text" class="form-control" name="unidad" id="unidad" 
                                placeholder="Escriba la unidad medida" 
                                required pattern="^\w{1,5}$"
                                data-parsley-pattern-message="Unidad Medida invalida!"
                                data-parsley-required-message="la Unidad Medida es requerida!"
                                data-parsley-trigger="change">
                          
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">

                            <label for="detalle" class="control-label">Detalle</label>

                            <input type="text" class="form-control" name="detalle" id="detalle" 
                                placeholder="Escriba el Detalle" 
                                required pattern="/^[A-Za-z0-9\s]+$/g"
                                data-parsley-pattern-message="Detalle invalido!"
                                data-parsley-required-message="El Detalle es requerido!"
                                data-parsley-trigger="change">
                          
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group">

                                <label for="Precio" class="control-label">Precio Unitario</label>

                                <input type="text" class="form-control" name="precio" id="precio"
                                    placeholder="Escriba el Precio Unitario" 
                                    required pattern="^[0-9]+(\.[0-9]{1,10})?$"
                                    data-parsley-pattern-message="Precio UnitarioInvalido!"
                                    data-parsley-required-message="El campo Precio Unitario es requerido!"
                                    data-parsley-trigger="change">

                            </div>
                        </div>
                        
                </div>
            </div>
            <div class="modal-footer">            
                <button type="button" class="btn btn-danger waves-effect" 
                    data-dismiss="modal">Cancelar</button>
                
                <button type="button" class="btn btn-success waves-effect waves-light hidePass1" 
                    data-dismiss="modal" id='btn_send'>Agregar</button>
                
                <button type="button" class="btn btn-success waves-effect waves-light hidePass2" 
                    data-dismiss="modal" id='btn_update'>Actualizar</button>
               
            </div> 
        </form>       
    </div>
</div>
<div >

</div>

