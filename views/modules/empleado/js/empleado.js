/* Llamado o ejecución de funciones */
dtEmpleado();
guardar();
eliminar();
var table;

//Creación de funciones JS para el módulo empleado
function dtEmpleado(){
	
	if ( $.fn.DataTable.isDataTable('#dt_empleado') )
	$("#dt_empleado").empty();

	table = $("#dt_empleado").DataTable({
		"bDestroy": true,
		ajax:{
			method: "POST",
			url: "../src/empleado/EmpleadoController.php",
			data: {opcion:"listar"}
		},
		columns:[
			{"data":"idempleado"},
			{"data":"nombres"},
			{"data":"apellidopaterno", 
			"render": function(data, type, full, meta){
				return `${full.apellidopaterno+" "+full.apellidomaterno}`;
			}},
			{"data":"apellidomaterno", visible:false},
			{"data":"email"},
			{"data":"celular"},
			{"defaultContent": `<button type='button' data-target='#modalmodificar' data-toggle='modal' class='modificar btn btn-primary' ><i class='fa fa-pencil-square-o'></i></button>
			<button type='button' data-target='#modaleliminar' data-toggle='modal' class='eliminar btn btn-danger' ><i class='fa fa-trash-o'></i></button>`}
		]
	});
	
	obtener_data_modificar("#dt_empleado tbody", table);
	obtener_idempleado_eliminar("#dt_empleado tbody", table);
}

function obtener_data_modificar (tbody, table){
	$(tbody).on("click", "button.modificar", function(){
		var data = table.row( $(this).parents("tr") ).data();
		console.log(data);
		var idusuario = $("#idempleado").val( data.idempleado ),
				nombre = $("#nombres").val( data.nombres ),
				apellidopaterno = $("#apellidopaterno").val( data.apellidopaterno ),
				apellidomaterno = $("#apellidomaterno").val( data.apellidomaterno ),
				email = $("#email").val( data.email ),
				celular = $("#celular").val( data.celular ),
				opcion = $("#opcion").val("modificar");
	});
}

function obtener_idempleado_eliminar (tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data = table.row( $(this).parents("tr") ).data();
		var idempleado = $("#frmeliminarempleado #idempleado").val( data.idempleado );
	});
}

function guardar(){
	$("#frmguardarempleado").on("submit", function(e){
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
			dtEmpleado();
			console.log(info);
		});
	});
}

function eliminar(){
	$("#frmeliminarempleado").on("submit", function(e){
		e.preventDefault();
		//alert("form hola");
		var frm = $(this).serialize();
		var controller = $(this).attr("action");
		console.log(controller);
		console.log( frm );
		$.ajax({
			method:"POST",
			url:"../src/"+controller+".php",
			data: frm
		}).done(function(info){			
			mensajes( info );
			dtEmpleado();			
		});
	});
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
