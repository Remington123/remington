/* Llamado o ejecución de funciones */
dtCliente();
guardar();
//alert("Cliente.js");
//guardar();

//Creación de funciones JS para el módulo cliente
function dtCliente(){

	if ( $.fn.DataTable.isDataTable('#dt_cliente') )
	  	$("#dt_cliente").empty();

	var table = $("#dt_cliente").DataTable({
		detroy: true,
		ajax:{
			method: "POST",
			url: "../src/cliente/ClienteController.php",
			data: {opcion:"listar"}
		},
		columns:[
			{"data":"idcliente"},
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

	obtener_data_modificar("#dt_cliente tbody", table);
}

function obtener_data_modificar (tbody, table){
	$(tbody).on("click", "button.modificar", function(){
		var data = table.row( $(this).parents("tr") ).data();
		console.log(data);
		var idusuario = $("#idcliente").val( data.idcliente ),
				nombre = $("#nombre").val( data.nombres ),
				apellidopaterno = $("#apellidopaterno").val( data.apellidopaterno ),
				apellidomaterno = $("#apellidomaterno").val( data.apellidomaterno ),
				email = $("#email").val( data.email ),
				celular = $("#celular").val( data.celular ),
				opcion = $("#opcion").val("modificar");
	});
}

function guardar(){
	$("#frmguardarcliente").on("submit", function(e){
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
			mensajes( info );
			console.log(info);
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
