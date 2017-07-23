$(function(){
	//alert("Cliente.js");
	dtCliente();
	//Guardar();
});

function dtCliente(){
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
			{"defaultContent": `<button type='button' class='modificar btn btn-primary' data-toggle='modal' data-target='#modalModificar' ><i class='fa fa-pencil-square-o'></i>Edit</button>
			<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i>Delete</button>`}
		]
	});
}

function Guardar(){
	$("#frm-cliente-registrar").on("submit", function(e){
		e.preventDefault();
		var frm = $(this).serialize();
		//console.log(frm);
		var controller = $(this).attr("action");
		//console.log("Controlador: " + controller);
		$.ajax({
			method:"POST",
			url:"../../../src/"+controller,
			data: frm
		}).done(function(info){
			//respuesta del servidor
			console.log(info);
			limpiarCajas();
		});
	});
}

function limpiarCajas(){
	$("input").val("");
}