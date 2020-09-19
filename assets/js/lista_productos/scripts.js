var arrayDataTMP;
var arrayDataSelectedTMP= [];
var btn_plus = document.getElementById('button_plus');

var total = 0;
var iva = 0;
var totaliva = 0;

function agregaPizza(){
        
    pizzaId = document.getElementById('select_producto').value;  
 
    row = search(pizzaId, arrayDataTMP);
    arrayDataSelectedTMP.push(row);
    despliegaTablaHTML();

}
function eliminarPizza(id){

    id = id - 1;
    arrayDataSelectedTMP.splice(id,1);
    despliegaTablaHTML();

}
function limpiar(){

    arrayDataSelectedTMP = [];
 
    despliegaTablaHTML();

    document.getElementById('total_id').innerHTML = '';  
    document.getElementById('iva_id').innerHTML = ''; 
    document.getElementById('totaliva_id').innerHTML = '';

    document.getElementById('total').value = 0;  
    document.getElementById('iva').value = 0; 
    document.getElementById('totaliva').value = 0; 

}
function despliegaTablaHTML(){

    var th = '';
    var count = 1;

    total = 0;
    iva = 0;
    totaliva = 0;

    arrayDataSelectedTMP.forEach(element => {

        th += '<tr><th scope="row">'+count+'</th>' + 
            '<td><div class="float-left">'+element.nombre+'</div></td>' +
            '<td><div class="float-right"> Bs S. '+element.precio+'</div></td>' +
            '<td><div class="float-right">' +
            '<img src="assets/images/minus32.png" alt="plus-image" id="button_minus" ' +
            'onclick="eliminarPizza('+count+')"></div>' +
            '</td></tr>';
        
        total += parseFloat(element.precio);  
        iva += parseFloat(element.precio) * 0.12;

        totalIva = total + iva;

        count += 1;

    });

    document.getElementById('body_table').innerHTML = th;  
    document.getElementById('total_id').innerHTML = ' Bs S. '+total;  
    document.getElementById('iva_id').innerHTML =  ' Bs S. '+iva; 
    document.getElementById('totaliva_id').innerHTML = ' Bs S. '+totalIva; 

    document.getElementById('total').value = total;  
    document.getElementById('iva').value = iva; 
    document.getElementById('totaliva').value = totalIva; 
   
}
function search(id, myArray){
    for (var i=0; i < myArray.length; i++) {
        if (myArray[i].id === id) {
            return myArray[i];
        }
    }
}
function enviarData(){

    if(arrayDataSelectedTMP.length > 0){
        Swal.fire({
            title: "Esta Seguro?",
            text: 'Desea proceder con el pedido',
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Aceptar"
        }).then(function(t) {

            fechaVenta = document.getElementById("fechaActual").value;
            totalVenta = document.getElementById('total').value;
            ivaVenta = document.getElementById('iva').value;  
            totalIvaVenta = document.getElementById('totaliva').value; 

            descripcion = 'Fecha de la venta : '+fechaVenta+' ; '+ 
                            'Total :' +totalVenta+ ';' + 
                            'Iva :'+ivaVenta+ ';' +  
                            'Total + Iva:' +totalIvaVenta+ ';';

            compra = '';

            arrayDataSelectedTMP.forEach(element => {
                compra +=  'producto:'+element.nombre +', Precio:'+element.precio+';'
            });
            
            dataSend = {
                idUsuario : document.getElementById("idUsuario").value,
                fechaActual : document.getElementById("fechaActual").value,
                monto_total : document.getElementById('totaliva').value,
                monto_iva : document.getElementById('iva').value,
                descripcion : descripcion+compra,
                data : arrayDataSelectedTMP
            }

            var request = $.ajax({
                url: 'http://localhost/test001/pedido_add',
                data: dataSend,
                async: false,
                type : 'POST',             
                success : ( response) => {
                    alertSwal( "Venta realizada!",
                        "gestión operativa exitosa", "success", true );                    
                }
            });
    
            request.fail(function(jqXHR, textStatus) {
                alertSwal("Por favor intente mas tarde", 
                    "Error en el sistema comuniquese con el administrador.", "error", false );
            });

        });
        
    }else{


        Swal.fire({
            title:"Por favor seleccione una pizza", text:"Verifique en el selector!", type: "info",
            confirmButtonClass:"btn btn-confirm mt-2"
        });
    }

}
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

$(document).ready(function() {

    btn_plus.addEventListener("click", agregaPizza);

    $.ajax({
       url: 'http://localhost/test001/lista_pizzas',
       async: false,
       type : 'GET',             
       success : (response)=>{

           data = JSON.parse(response);

           data.forEach(element => {
               var option = document.createElement("option");
               option.text = element.nombre;
               option.value =  element.id;
               var select = document.getElementById("select_producto");
               select.appendChild(option);

               obj = {

               };
           });
          
           arrayDataTMP = data
       }
   });

});


