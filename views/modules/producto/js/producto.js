/* Llamado o ejecución de funciones */
//var table;
dtProducto();
llenarComboCategoria("registrar", 0);
obtenerIdCategoria();
llenarComboTela("registrar", 0);
guardar();
eliminar();

//Creación de funciones JS para el módulo producto


function guardar(){
	$("#frmguardarproducto").on("submit", function(e){
		e.preventDefault();
		//alert("form hola");
		var frm = $(this).serialize();
		var controller = $(this).attr("action");
		$.ajax({
			method:"POST",
			url:"../src/"+controller+".php",
			data: frm
		}).done(function(info){
			mensajes( info );
			dtProducto();
		});
	});
}

function eliminar(){
	$("#frmeliminarproducto").on("submit", function(e){
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
			dtProducto();			
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

function limpiarMensaje(){
	$(".mensaje").html("").addClass("ocultar");
}

function dtProducto(){

	if ( $.fn.DataTable.isDataTable('#dt_producto') )
	  	$("#dt_producto").empty();

	var table = $("#dt_producto").DataTable({
		destroy: true,
		ajax:{
			method: "POST",
			url: "../src/producto/ProductoController.php",
			data: {opcion:"listar"}
		},
		columns:[
			{"data":"idproducto"},
			{"data":"descripcion"},
			{"data":"precio"},
			{"data":"precioventa"},
			{"data":"stock"},
			{"data":"stockactual", "width": "100px" },
			{"defaultContent": `<button type='button' data-target='#modalmodificar' data-toggle='modal' class='modificar btn btn-primary' ><i class='fa fa-pencil-square-o'></i></button>
			<button type='button' data-target='#modaleliminar' data-toggle='modal' class='eliminar btn btn-danger' ><i class='fa fa-trash-o'></i></button>`}
		]
	});

	obtener_data_modificar("#dt_producto tbody", table);
	obtener_idproducto_eliminar("#dt_producto tbody", table);

}

function obtener_data_modificar (tbody, table){
	$(tbody).on("click", "button.modificar", function(){
		var data = table.row( $(this).parents("tr") ).data();
		console.log(data);
		var idproducto = $("#idproducto").val( data.idproducto ),
				descripcion = $("#descripcion").val( data.descripcion ),
				precio = $("#precio").val( data.precio ),
				precioventa = $("#precioventa").val( data.precioventa ),
				stock = $("#stock").val( data.stock ),
				stockactual = $("#stockactual").val( data.stockactual ),
				idcategoriaproducto = data.idcategoriaproducto,
				idtalla = data.idtalla,
				idmodelo = data.idmodelo,
				idtela = data.idtela,
				opcion = $("#opcion").val("modificar");

		//aquí se tendrá que llamar a los combos con los valores seleccionados
		llenarComboCategoria("modificar", idcategoriaproducto);
		llenarComboTalla("modificar", idcategoriaproducto, idtalla);
		llenarComboModelo("modificar", idcategoriaproducto, idmodelo);
		llenarComboTela("modificar", idtela);

		limpiarMensaje();
	});
}

function obtener_idproducto_eliminar (tbody, table){
	$(tbody).on("click", "button.eliminar", function(){
		var data = table.row( $(this).parents("tr") ).data();
		var idproducto = $("#frmeliminarproducto #idproducto").val( data.idproducto );

		limpiarMensaje();
	});
}

function llenarComboCategoria(accion, idcategoriaproducto){
	$.ajax({
		method: "POST",
		url: "../src/categoriaproducto/CategoriaProductoController.php",
		data: {opcion:"listar"}
	}).done( function( info ){
		var categoria = JSON.parse( info ),
			option = "";
		$("#idcategoriaproducto").html("");//limpiar el combo
		option +=`<option> Seleccionar </option>`;

		if( accion == "registrar" ){			
			for(i in categoria.data )
				option +=`<option value="${categoria.data[i].idcategoriaproducto}"> ${categoria.data[i].descripcion} </option>`;
			
		}else if( accion == "modificar" ){
			for(i in categoria.data ){
				if( idcategoriaproducto == categoria.data[i].idcategoriaproducto )
					option += `<option selected value="${categoria.data[i].idcategoriaproducto}"> ${categoria.data[i].descripcion} </option>`;
				else option +=`<option value="${categoria.data[i].idcategoriaproducto}"> ${categoria.data[i].descripcion} </option>`;
			}
		}

		$("#idcategoriaproducto").html(option);
	});
}

function obtenerIdCategoria(){
	$("#idcategoriaproducto").on("change", function(){
		var idcategoria = $(this).prop("value");
		//console.log( idcategoria );
		llenarComboModelo("registrar", idcategoria, 0);
		llenarComboTalla("registrar", idcategoria, 0);
	});
}

function llenarComboTalla(accion, idcategoriaproducto, idtalla){
	$.ajax({
		method: "POST",
		url: "../src/talla/TallaController.php",
		data: {opcion:"combo", idcategoriaproducto : idcategoriaproducto}
	}).done( function( info ){
		var talla = JSON.parse( info ),
			option = "";
		console.log(talla.length);
		$("#idtalla").html("");//limpiar el combo
		//option +=`<option> Seleccionar </option>`;

		if( talla.length == 0 ){
			option +=`<option> No hay datos </option>`;
		}else{
			if( accion == "registrar" ){			
				for(i in talla.data )
					option +=`<option value="${talla.data[i].idtalla}"> ${talla.data[i].descripcion} </option>`;
				
			}else if( accion == "modificar" ){
				for(i in talla.data ){
					if( idtalla == talla.data[i].idtalla )
						option += `<option selected value="${talla.data[i].idtalla}"> ${talla.data[i].descripcion} </option>`;
					else option +=`<option value="${talla.data[i].idtalla}"> ${talla.data[i].descripcion} </option>`;
				}
			}
		}

		$("#idtalla").html(option);
	});
}

function llenarComboModelo(accion, idcategoriaproducto, idmodelo){
	$.ajax({
		method: "POST",
		url: "../src/modelo/ModeloController.php",
		data: {opcion:"combo", idcategoriaproducto : idcategoriaproducto}
	}).done( function( info ){
		var modelo = JSON.parse( info ),
			option = "";
		$("#idmodelo").html("");//limpiar el combo
		//option +=`<option> Seleccionar </option>`;
		if( modelo.length == 0 ){
			option +=`<option> No hay datos </option>`;
		}else{
			if( accion == "registrar" ){			
				for(i in modelo.data )
					option +=`<option value="${modelo.data[i].idmodelo}"> ${modelo.data[i].descripcion} </option>`;
				
			}else if( accion == "modificar" ){
				for(i in modelo.data ){
					if( idmodelo == modelo.data[i].idmodelo )
						option += `<option selected value="${modelo.data[i].idmodelo}"> ${modelo.data[i].descripcion} </option>`;
					else option +=`<option value="${modelo.data[i].idmodelo}"> ${modelo.data[i].descripcion} </option>`;
				}
			}
		}

		$("#idmodelo").html(option);
	});
}

function llenarComboTela(accion, idtela){
	$.ajax({
		method: "POST",
		url: "../src/tela/TelaController.php",
		data: {opcion:"combo"}
	}).done( function( info ){
		var tela = JSON.parse( info ),
			option = "";
		$("#idtela").html("");//limpiar el combo
		option +=`<option> Seleccionar </option>`;

		if( accion == "registrar" ){			
			for(i in tela.data )
				option +=`<option value="${tela.data[i].idtela}"> ${tela.data[i].descripcion} </option>`;
			
		}else if( accion == "modificar" ){
			for(i in tela.data ){
				if( idtela == tela.data[i].idtela )
					option += `<option selected value="${tela.data[i].idtela}"> ${tela.data[i].descripcion} </option>`;
				else option +=`<option value="${tela.data[i].idtela}"> ${tela.data[i].descripcion} </option>`;
			}
		}

		$("#idtela").html(option);
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
