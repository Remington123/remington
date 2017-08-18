/* Llamado o ejecución de funciones */
obtenerDataPedido();
//guardar();

//Creación de funciones JS para el módulo detallepedido
function obtenerDataPedido(){
	$("#btnlistar-detallepedido").on("click",function(){
		var idpedido = $("#idpedido").val();
		alert( idpedido );
	});
}

function dtDetallePedido( idpedido ){

	if ( $.fn.DataTable.isDataTable('#dt_detallepedido') )
	  	$("#dt_detallepedido").empty();

	var table = $("#dt_detallepedido").DataTable({
		detroy: true,
		ajax:{
			method: "POST",
			url: "../src/detallepedido/DetallePedidoController.php",
			data: {opcion:"listarPedidoConDetalle", idpedido: idpedido}
		},
		columns:[
			{"data":"iddetallepedido"},
			{"data":"idpedido"},
			{"data":"idproducto"},
			{"data":"producto"},
			{"data":"cantidad"},
			{"data":"importe"},
			{"defaultContent": `<button type='button' data-target='#modalmodificar' data-toggle='modal' class='modificar btn btn-primary' ><i class='fa fa-pencil-square-o'></i></button>
			<button type='button' data-target='#modaleliminar' data-toggle='modal' class='eliminar btn btn-danger' ><i class='fa fa-trash-o'></i></button>`}
		]
	});

	//obtener_data_modificar("#dt_detallepedido tbody", table);
}

function obtener_data_modificar (tbody, table){
	$(tbody).on("click", "button.modificar", function(){
		var data = table.row( $(this).parents("tr") ).data();
		console.log(data);
		var iddetallepedido = $("#iddetallepedido").val( data.iddetallepedido ),
				descripcion = $("#descripcion").val( data.descripcion ),
				opcion = $("#opcion").val("modificar");
	});
}

function guardar(){
	$("#frmdetallepedidoregistrar").on("submit", function(e){
		e.preventDefault();
		var frm = $(this).serialize();
		//console.log(frm);
		var controller = $(this).attr("action");
		//console.log("Controlador: " + controller);
		$.ajax({
			method:"POST",
			url:"../src/"+controller,
			data: frm
		}).done(function(info){
			//respuesta del servidor
			console.log(info);
			
		});
	});
}

var spanish = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
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
    }
}
