/* Llamado o ejecución de funciones */
dtTela();
guardar();

//Creación de funciones JS para el módulo empleado
function dtTela(){

	if ( $.fn.DataTable.isDataTable('#dt_tela') )
	  	$("#dt_tela").empty();

	var table = $("#dt_tela").DataTable({
		"bDestroy": true,
		ajax:{
			method: "POST",
			url: "../src/tela/TelaController.php",
			data: {opcion:"listar"}
		},
		columns:[
			{"data":"idtela"},
			{"data":"descripcion"}
		]
	});

	obtener_data_modificar("#dt_tela tbody", table);
}

function obtener_data_modificar (tbody, table){
	$(tbody).on("click", "button.modificar", function(){
		var data = table.row( $(this).parents("tr") ).data();
		console.log(data);
		var idtela = $("#idtela").val( data.idtela ),
				descripcion = $("#descripcion").val( data.descripcion ),
				opcion = $("#opcion").val("modificar");
				limpiarMensaje();
	});
}

function guardar(){
	$("#frmguardartela").on("submit", function(e){
		e.preventDefault();
		var frm = $(this).serialize();
		//console.log(frm);
		var controller = $(this).attr("action");
		//console.log("Controlador: " + controller);
		$.ajax({
			method:"POST",
			url:"../src/"+controller+".php",
			data: frm
		}).done(function(info){
			//respuesta del servidor
			mensajes( info );
			console.log(info);
		});
	});
}

function limpiarMensaje(){
	$(".mensaje").html("").addClass("ocultar");
}


function mensajes( info ){
	var json = JSON.parse(info);

	var texto = "", color = "", div="";
	if(json.respuesta == "bien"){
		texto = "<strong>Bien!</strong> Se han guardado los cambios correctamente.";
		color = "alert-success";
	}
	if(json.respuesta == "error"){
		texto = "<strong>Error</strong>, no se ejecutó la consulta.";
		color = "alert-danger";
	}
	if(json.respuesta == "llenar_datos"){
		texto = "<strong>Advertencia!</strong> Llenar todos los datos solicitados.";
		color = "alert-warning";
	}
	if(json.respuesta == "id_indefinido"){
		texto = "<strong>Advertencia!</strong> ID no definido.";
		color = "alert-warning";
	}
	console.log(texto);
	div = `<div class="alert ${color} alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>					
				</button>
				${texto}
			</div>`;

	$(".mensaje").html( div ).removeClass("ocultar");
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
