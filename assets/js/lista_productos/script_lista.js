
$(document).ready(function() {
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
                return data;
            }},

            {data: "CodigoComercial",  render: function ( data, type, row ) {
                return data;
            }},
            {data: "UnidadMedida",  render: function ( data, type, row ) {
                return data;
            }},
            {data: "UnidadMedidaComercial",  render: function ( data, type, row ) {
                return data;
            }},
             {data: "Detalle",  render: function ( data, type, row ) {
                return data;
             }}, 
             {data: "PrecioUnitario",  render: function ( data, type, row ) {
                return data;
                 }
             },
             {data: "ImpuestoTarifa",  render: function ( data, type, row ) {
                return data;
            }}
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