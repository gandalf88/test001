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
                            <label for="nombres" class="control-label">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" 
                            placeholder="Escriba su nombre" 
                            data-parsley-required-message="El campo nombres es requerido!"
                            data-parsley-trigger="change">
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="apellidos" class="control-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Escriba su apellido" 
                            data-parsley-required-message="El campo apellidos es requerido!"
                            data-parsley-trigger="change">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cedula" class="control-label">Cédula</label>
                                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Introdusca su cédula" required 

                            data-parsley-required-message="El campo cedula es requerido!"
                            data-parsley-trigger="change">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="correo" class="control-label">Correo</label>
                                <input type="email" class="form-control" id="correo" 
                                    placeholder="Introdusca su correo"  data-parsley-trigger="change" 
                                    required="">
                                <input type="text" id="idUsuario" value="" class="oculto">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="telefono" class="control-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" placeholder="Introdusca el teléfono">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="tipo"  class="control-label">Tipo de Usuario</label>
                                <div class="form-group">
                                    Vendedor: <input type="radio" name="tipo" id="tipoV" value="1" required="">
                                    <br>
                                    Administrador: <input type="radio" name="tipo" id="tipoA" value="2">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="contrasenia" class="control-label">Contraseña</label>
                                <input type="password" class="form-control" 
                                    id="contrasenia" placeholder="escriba una contraseña" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="confirmacion" class="control-label">Confirmación de Contraseña</label>
                                <input type="password" class="form-control" id="confirmacion"
                                     placeholder="Confirme la contraseña" required=""
                                     data-parsley-equalto="#contrasenia" 
                                     data-parsley-equalto-message="La contraseña debe coincidir con la confirmación!">
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

