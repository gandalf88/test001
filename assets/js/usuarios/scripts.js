var objFlag ={
    valueEnd : false
};


$(function () {

    async function alertSwal(title, text, type, valuetmp ){
       
        tmp = false;

        Swal.fire({
            title:title, text:text, type: type,
            confirmButtonClass:"btn btn-confirm mt-2",
            preConfirm: () => {
                tmp = valuetmp;
                location.reload(true);
            }
        });


        return tmp;
        
    }

    async function sendData(opc="" ){
        
        let tipoV = document.getElementById('tipoV').value;
        let tipoA = document.getElementById('tipoA').value;

        if (document.getElementById('tipoV').checked) { tipo = tipoV; }
        if (document.getElementById('tipoA').checked) { tipo = tipoA; }

        if(opc==="update"){
            data = {
                nombres : document.getElementById('nombres').value,
                apellidos :document.getElementById('apellidos').value,
                cedula : document.getElementById('cedula').value,
                correo : document.getElementById('correo').value,
                telefono : document.getElementById('telefono').value,
                tipo : tipo,
                contrasenia : document.getElementById('contrasenia').value,
                id : document.getElementsByClassName("oculto")[0].value,
            };
        }else{
            data = {
                nombres : document.getElementById('nombres').value,
                apellidos :document.getElementById('apellidos').value,
                cedula : document.getElementById('cedula').value,
                correo : document.getElementById('correo').value,
                telefono : document.getElementById('telefono').value,
                tipo : tipo,
                contrasenia : document.getElementById('contrasenia').value
            };
        }
        
        var request = $.ajax({
            url: (opc==="update")?'http://localhost/test001/usuarios_update' : 'http://localhost/test001/usuarios_add',
            data: data,
            async: false,
            type : 'POST',             
            success : ()=>{
                objFlag.valueEnd = (opc==="update")?
                    alertSwal("Usuario Actualizado!", "gestión operativa exitosa", "success", true ) : 
                    alertSwal("Usuario creado!", "gestión operativa exitosa", "success", true );
                  
                console.log(objFlag.valueEnd);
            }
        });

        //Este bloque se ejecuta si hay un error
        request.fail(function(jqXHR, textStatus) {
            objFlag.valueEnd = alertSwal("Por favor intente mas tarde", 
                "Error en el sistema comuniquese con el administrador.", "error", false );
        }); 
        
    }
    
    $("#btn_update").click(function(){
   
        event.preventDefault();
        
        var isValid = true;

        $('input').each( function() {
           if ($(this).parsley().validate() !== true) isValid = false;
        });
 
        if (isValid) {
            sendData("update");
        }else{
            return !1;
        }

    });
    $("#btn_send").click(function(){
   
        event.preventDefault();
        
        var isValid = true;

        $('input').each( function() {
           if ($(this).parsley().validate() !== true) isValid = false;
        });
 
        if (isValid) {
            sendData();
        }else{
            return !1;
        }

    });
});

$(document).ready(function() {

    let inputHidden = document.getElementsByClassName("oculto");
    inputHidden[0].style.display ="none";

    $('#addUser').click(function(){
        switchBtn( "Agregar Usuarios", "block", "none" );

          //Código para recargar página
          document.getElementById( 'nombres' ).value ='';
          document.getElementById( 'apellidos' ).value = '';
          document.getElementById( 'cedula' ).value  ='';
          document.getElementById( 'correo' ).value='';
          document.getElementById( 'telefono' ).value ='';
          document.getElementById( 'contrasenia' ).value ='';

    });

    $('#usuarios_id').DataTable({
        'processing': true,
        'serverSide': true,
        'paging': true,
        'searching': true,
        'ordering': true,
        'order': [[0, "asc"]],
        'scrollX': true,
        'scroller': true,
        'serverMethod': 'post',
        'ajax': {
            'url': 'http://localhost/test001/usuarios_list',
        },
        'columns': [
            {data: "nombres"}, 
            {data: "apellidos"},
            {data: "cedula"}, 
            {data: "correo"}, 
            {data: "telefono"},
            {data: "tipo_usuario"},   
            {   
                data: "accion",
                render: function ( data, type, row ) {
                    
                    dataObj = JSON.parse(data);    
                    if(dataObj.status=='1'){
                        btn_activate = '<button type="button" class="btn btn-danger waves-effect waves-light" onclick="lockUser('+dataObj.id+',0)">'+
                        'Bloquear<span class="btn-label-right"><i class="mdi mdi-close-circle-outline"></i></span></button>';
                    }else{
                        btn_activate = '<button type="button" class="btn btn-success waves-effect waves-light" onclick="lockUser('+dataObj.id+', 1)">'+
                        'Desbloquear<span class="btn-label-right"><i class="mdi mdi-close-circle-outline"></i></span></button>';
                    }


                    return '<button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal" onclick="updateUser('+dataObj.id+')">Actualizar'+
                    '<span class="btn-label-right"><i class="mdi mdi-alert-circle-outline"></i></span></button>'+btn_activate;


                }
            },   
            
        ], "language": { "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad"
        }}
       
    });
 
});
function lockUser( id, status){

    msg='';
    
    if(status === 0){
        msg = 'Desea bloquear al usuario?';
    }
    else{
        msg = 'Desea desbloquear al usuario?';
    }

    Swal.fire({
        title: "Esta Seguro?",
        text: msg,
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Aceptar"
    }).then(function(t) {

        data = {
            id: id,
            status : status
        }

        var request = $.ajax({
            url: 'http://localhost/test001/usuarios_lock',
            data: data,
            async: false,
            type : 'POST',             
            success : (response)=>{
                console.log(response);
                location.reload(true);
            }
        });

        //Este bloque se ejecuta si hay un error
        request.fail(function(jqXHR, textStatus) {
             alertSwal("Por favor intente mas tarde", 
                "Error en el sistema comuniquese con el administrador.", "error", false );
        }); 
    })
}

function updateUser(id){

    switchBtn("Actualizar Usuarios","none", "block");

    var idUsuario = document.getElementsByClassName("oculto");
    idUsuario[0].value = id;

    data = {
        id: id
    }

    var request = $.ajax({
        url: 'http://localhost/test001/usuarios_get',
        data: data,
        async: false,
        type : 'POST',             
        success : (response)=>{

            response = JSON.parse(response);

            document.getElementById( 'nombres' ).value = response.nombres;
            document.getElementById( 'apellidos' ).value = response.apellidos;
            document.getElementById( 'cedula' ).value  = response.cedula;
            document.getElementById( 'correo' ).value = response.correo;
            document.getElementById( 'telefono' ).value = response.telefono;
            document.getElementById( 'contrasenia' ).value = "";

            if(response.tipo_usuario == 1){
                document.getElementById( 'tipoV' ).checked = true;
            }else{
                document.getElementById( 'tipoA' ).checked = true;
            }
            
        }
    });

    request.fail(function(jqXHR, textStatus) {
         alertSwal("Por favor intente mas tarde", 
            "Error en el sistema comuniquese con el administrador.", "error", false );
    }); 

}

function switchBtn(title,display1, display2){

    document.getElementById("tituloModal").innerHTML= title;

    let btnSend = document.getElementsByClassName("hidePass1");
    btnSend[0].style.display =display1;

    let btnUpdate = document.getElementsByClassName("hidePass2");
    btnUpdate[0].style.display = display2;

}
