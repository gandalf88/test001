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

    async function sendData(opc=""){   
        let radio1 = document.getElementById("naturalezaRadio1").checked;
        let naturaleza = (radio1==true)?"0":"1";

        if(opc==="update"){
            
            data = {
                naturaleza : naturaleza,
                unidad : document.getElementById('unidad').value,
                detalle : document.getElementById('detalle').value,
                precio : document.getElementById('precio').value,
                id : document.getElementsByClassName("oculto")[0].value,
            };

        }else{

            data = {
                naturaleza : naturaleza,
                unidad : document.getElementById('unidad').value,
                detalle : document.getElementById('detalle').value,
                precio :document.getElementById('precio').value,
            };

        }
        var request = $.ajax({
            url: (opc==="update")?'http://localhost/test001/productos_update' : 'http://localhost/test001/productos_add',
            data: data,
            async: false,
            type : 'POST',             
            success : ()=>{
                objFlag.valueEnd = (opc==="update")?
                    alertSwal("Producto Actualizado!", "gestión operativa exitosa", "success", true ) : 
                    alertSwal("Producto creado!", "gestión operativa exitosa", "success", true );
                  
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
    $('#buscadorAPi').click(function(){
     
        let url = "https://api.hacienda.go.cr/fe/ex?autorizacion="+document.getElementById( 'api_hacienda' ).value;

        $.ajax({
            url: url,
            async: false,
            type : 'GET',             
            success : (response)=>{

                document.getElementById( 'fecha_emi' ).innerHTML = response.fechaEmision;
                document.getElementById( 'fecha_ven' ).innerHTML =  response.fechaVencimiento;
                document.getElementById( 'idem' ).innerHTML =  response.identificacion;

                document.getElementById( 'ins' ).innerHTML =  response.nombreInstitucion;
                document.getElementById( 'num' ).innerHTML =  response.numeroDocumento;
                document.getElementById( 'exo' ).innerHTML = response.porcentajeExoneracion;
                document.getElementById( 'tipo' ).innerHTML = " Código: "+ response.tipoDocumento.codigo+" <br> Descripción:"+ response.tipoDocumento.descripcion;
                console.log(response);
                alert( "Load was performed." );

            }
        });

    });
});
$(document).ready(function() {

    let inputHidden = document.getElementsByClassName("oculto");
    inputHidden[0].style.display ="none";

    $('#addProducto').click(function(){

        switchBtn( "Agregar Producto", "block", "none" );

        document.getElementById("naturalezaRadio1").checked = true;
        
        document.getElementById( 'unidad' ).value ="";
        document.getElementById( 'detalle' ).value ="";
        document.getElementById( 'precio' ).value = "";

    });



    $('#productos_id').DataTable({
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
            'url': 'http://localhost/test001/productos_list',
        },
        'columns': [
            {data: "naturalezaProducto",  render: function ( data, type, row ) {
                if(data==""){
                    return "No disponible";
                }else{
                    return (data=="0")?'BIEN':'SERVICIO';
                }
                
            }},
            {data: "CodigoComercial",  render: function ( data, type, row ) {
                return (data=="")?"No disponible":data;
            }},
            {data: "UnidadMedida",  render: function ( data, type, row ) {
                return (data=="")?"No disponible":data;
            }},
            {data: "UnidadMedidaComercial",  render: function ( data, type, row ) {
                return (data=="")?"No disponible":data;
            }},
            {data: "Detalle",  render: function ( data, type, row ) {
                return (data=="")?"No disponible":data;
            }}, 
            {data: "PrecioUnitario",  render: function ( data, type, row ) {
                return (data=="")?"No disponible":data;
            }},
            {data: "ImpuestoTarifa",  render: function ( data, type, row ) {
                return (data=="")?"No disponible":data;
            }},  
            {   
                data: "accion",
                render: function ( data, type, row ) {
                    
                    dataObj = JSON.parse(data); 

                    return '<button type="button" class="btn btn-info waves-effect waves-light" onclick="updateUser('+data+')" '+
                    'data-toggle="modal" data-target="#con-close-modal" >Actualizar'+
                    '<span class="btn-label-right"><i class="mdi mdi-alert-circle-outline"></i></span></button>';
                }
            } 
        ],"language": { "sProcessing":     "Procesando...",
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


function updateUser(id){

    switchBtn("Actualizar Usuarios","none", "block");

    var idUsuario = document.getElementsByClassName("oculto");
    idUsuario[0].value = id;

    data = {
        id: id
    }

    var request = $.ajax({
        url: 'http://localhost/test001/productos_get',
        data: data,
        async: false,
        type : 'POST',             
        success : (response)=>{

            response = JSON.parse(response);
            
            let naturaleza = response.naturalezaProducto;

            if(naturaleza == 0 ){ 
                document.getElementById("naturalezaRadio1").checked = true;
            }else{
                document.getElementById("naturalezaRadio2").checked = true;
            }
           

            document.getElementById( 'unidad' ).value = response.UnidadMedida;
            document.getElementById( 'detalle' ).value = response.Detalle;
            document.getElementById( 'precio' ).value = response.PrecioUnitario;
                
            
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