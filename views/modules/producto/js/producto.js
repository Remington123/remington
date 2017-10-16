/* Llamado o ejecución de funciones */
//var table;
dtProducto();
llenarComboCategoria("registrar", 0);
buscarDtProducto();
llenarComboColor("registrar", 0);
//seleccionarProducto();
agregarItemDetalle();
//obtenerIdCategoria();

llenarComboTela("registrar", 0);
guardarAsignacion();
guardar();
eliminar();
obtenerDataProducto();

guardarModificacionStockPrecio();
mostrarDtProductoColor();

var tabla_detalle = "";

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


function obtenerDataProducto(){
	$("#btnlistar-producto").on("click",function(){
		var idproducto = $("#idproducto").val();
		if( idproducto == "" )
			alert("Ingresar código de producto");
		else{
			$.ajax({
				method: "POST",
				url: "../src/producto/ProductoController.php",
				data: {opcion:"listarProducto", idproducto: idproducto}
			}).done( function( info ){
				var producto = JSON.parse(info),
					idproducto = producto.data[0].idproducto;
				llenarDatosDeModulo( producto );	
				//Pasamos el idproducto como parámetro
					console.log("id prdo: "+ idproducto);
				dtDetalleProducto( idproducto );
			});
		}
	});
}

function llenarDatosDeModulo( producto ){
	$("#producto").val( producto.data[0].producto );
	$("#categoria").val( producto.data[0].categoria );
	$("#idcategoriaproducto").val( producto.data[0].idcategoriaproducto );
	$("#tela").val( producto.data[0].tela );
	$("#idtela").val( producto.data[0].idtela );
}

function dtDetalleProducto( idproducto ){

	if ( $.fn.DataTable.isDataTable('#dt_detalleproducto') )
		$("#dt_detalleproducto").empty();

	var table = $("#dt_detalleproducto").DataTable({
		"bDestroy": true,
		ajax:{
			method: "POST",
			url: "../src/detalleproducto/DetalleProductoController.php",
			data: {opcion:"listarProductoConDetalle", idproducto: idproducto}
		},
		columns:[
			{"data":"iddetalleproducto"},
			{"data":"modelo"},
			{"data":"talla"},
			{"data":"color"},
			{"data":"urlimagen", render: function(data){
				return `<img src="${data}" width="80" height="60">`;
			}},
			{"data":"stock"},
			{"data":"precio"},
			{"defaultContent": `<button type='button' data-target='#modalmodificar' data-toggle='modal' class='modificar btn btn-primary' ><i class='fa fa-pencil-square-o'></i></button>`}
		]
	});

	obtener_datadetalle_modificar("#dt_detalleproducto tbody", table);
}

function obtener_datadetalle_modificar (tbody, table){
	$(tbody).on("click", "button.modificar", function(){
		var data = table.row( $(this).parents("tr") ).data();
		console.log(data);

		var	opcion = $("#opcion").val("modificar"),
			iddetalleproducto = $("#iddetalleproducto").val( data.iddetalleproducto ),
			id_producto = $("#id_producto").val( data.idproducto ),
			stock = $("#stock").val( data.stock ),
			precio = $("#precio").val( data.precio );
	});
}

function guardarModificacionStockPrecio(){
	$("#frmmodificardetalleproducto").on("submit", function(e){
		e.preventDefault();
		//alert("form hola");
		var frm = $(this).serialize(),
			controller = $(this).attr("action"),
			idproducto = $("#idproducto").val();
			console.log( idproducto );
			console.log( frm );
		$.ajax({
			method:"POST",
			url:"../src/"+controller+".php",
			data: frm
		}).done(function(info){
			mensajes( info );
			dtDetalleProducto( idproducto );
		});
	});
}

function dtProducto(){
	if ( $.fn.DataTable.isDataTable('#dt_producto') )
		$("#dt_producto").empty();

	var table = $("#dt_producto").DataTable({
		"bDestroy": true,
		ajax:{
			method: "POST",
			url: "../src/producto/ProductoController.php",
			data: {opcion:"listar"}
		},
		columns:[
			{"data":"idproducto", "width": "5%"},
			{"data":"descripcion", "width": "10%"},
			{"data":"idcategoriaproducto", "width": "10%"},
			{"data":"idtela","width": "10%"},
			{"data":"estado", "width": "5%", 
			"render": function ( data, type, row, meta ) {
				if( row.estado == 1){
			    	return `<p class="bg-success text-center"><strong>Nuevo</strong></p>`;					
				}else if( row.estado == 2){
					return `<p class="bg-info text-center"><strong>Completo</strong></p>`;
				}
		    }},
			{"defaultContent": "", "width": "5%", 
			"render": function ( data, type, row, meta ) {
				if( row.estado == 2){
			    	return `<button type='button' data-target='#modalvisualizar' data-toggle='modal' class='visualizar btn btn-default' ><i class='fa fa-eye'></i></button>`;					
				}else{
					return `<button type='button' data-target='#modalmodificar' data-toggle='modal' class='modificar btn btn-primary' ><i class='fa fa-pencil-square-o'></i></button>
				<button type='button' data-target='#modaleliminar' data-toggle='modal' class='eliminar btn btn-danger' ><i class='fa fa-trash-o'></i></button>`;
				}
		    }}
		]
	});

	obtener_data_modificar("#dt_producto tbody", table);
	obtener_idproducto_eliminar("#dt_producto tbody", table);
	obtener_data_visualizar("#dt_producto tbody", table);
}

function obtener_data_visualizar (tbody, table){
	$(tbody).on("click", "button.visualizar", function(){
		var data = table.row( $(this).parents("tr") ).data();
		console.log(data);
		var idproducto = $("#visualizar-idproducto").val( data.idproducto ),
				descripcion = $("#visualizar-descripcion").val( data.descripcion ),
				idcategoriaproducto = data.idcategoriaproducto,
				idtalla = data.idtalla,
				idmodelo = data.idmodelo,
				idtela = data.idtela,
				opcion = $("#opcion").val("visualizar");

		//aquí se tendrá que llamar a los combos con los valores seleccionados
		llenarComboCategoria("visualizar", idcategoriaproducto);
		llenarComboTela("visualizar", idtela);

		limpiarMensaje();
	});
}

function obtener_data_modificar (tbody, table){
	$(tbody).on("click", "button.modificar", function(){
		var data = table.row( $(this).parents("tr") ).data();
		console.log(data);
		var idproducto = $("#idproducto").val( data.idproducto ),
				descripcion = $("#descripcion").val( data.descripcion ),
				idcategoriaproducto = data.idcategoriaproducto,
				idtalla = data.idtalla,
				idmodelo = data.idmodelo,
				idtela = data.idtela,
				opcion = $("#opcion").val("modificar");

		//aquí se tendrá que llamar a los combos con los valores seleccionados
		llenarComboCategoria("modificar", idcategoriaproducto);
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

function mostrarDtProductoColor(){
	$("#mostrarproductos").on("click", function(){

		if ( $.fn.DataTable.isDataTable('#dt_productocolor') )
			$("#dt_productocolor").empty();
		var idcolor = $("#idcolor").val();
		console.log("idcolor: "+ idcolor);

		var table = $("#dt_productocolor").DataTable({
			"bDestroy": true,
			"searching": false,
			"lengthChange": false,
			"language": spanish,
			ajax:{
				method: "POST",
				url: "../src/producto/ProductoController.php",
				data: {opcion:"listarPorColor", idcolor: idcolor}
			},
			columns:[
				{"data":"idproducto", "width": "5%"},
				{"data":"descripcion", "width": "40%"},
				//{"data":"color", "width": "20%"},
				{"data":"talla","width": "15%"},
				{"data":"stock","width": "10%"},
				{"data":"precio","width": "10%"}
			]
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

/* FUNCIONES PARA MÓDULO DETALLEPRODUCTO*/

function buscarDtProducto(){
	$("#buscar-producto").on("click", function(){
		var descripcion = $("#descripcion-prenda").val();

		if ( $.fn.DataTable.isDataTable('#buscar_dt_producto') )
	  	$("#buscar_dt_producto").empty();

		var table = $('#buscar_dt_producto').DataTable({
			"destroy": true,
			"ajax":{
				method:"POST",
				url: "../src/producto/ProductoController.php",
				data: {opcion:"buscar", descripcion: descripcion}
			},
			columns:[
				{"data":"idproducto"},
				{"data":"descripcion"},
				{"data":"idcategoriaproducto"},
				{"data":"idtela"},
				{"data":"categoria"},
				{"defaultContent": `<a hrefs='#' class='seleccionar' data-dismiss="modal" ><i class='fa fa-hand-o-left'></i></a>`}
			],
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": false,
			"info": true,
			"autoWidth": false
	    });

	    seleccionarProducto("#buscar_dt_producto tbody", table, "asginar");
	});
}

function seleccionarProducto(tbody, table, accion){
	$(tbody).on("click", "a.seleccionar", function(){
		var data = table.row( $(this).parents("tr") ).data();
		console.log( data );

		//Por si se escoge otro pruducto nuevo.		
		if ( $.fn.DataTable.isDataTable('#dt_detalleproducto') ){
	  		$("#dt_detalleproducto").empty();
		}
		
		var idcategoriaproducto = $("#idcategoriaproducto").val( data.idcategoriaproducto ),
			idproducto = $("#id_producto").val( data.idproducto ),
			descripcion = $("#descripcion").val( data.descripcion ),
			categoria = $("#categoria").val( data.categoria );
		llenarComboModelo("registrar", data.idcategoriaproducto , 0);
		llenarComboTalla("registrar", data.idcategoriaproducto , 0);
		//limpiarMensaje();
	});
}

function validarCampos(){
	var idproducto = $("#id_producto").val(),
		idmodelo = $("#idmodelo").val(),
		idtalla = $("#idtalla").val(),
		idcolor = $("#idcolor").val(),	
		stock = $("#stock").val(),
		precio = $("#precio").val(),
		url = $("#url_imagen").val(),
		respuesta = false;

	if( idproducto != "" && idmodelo != "", idtalla != "" && idcolor != "" && stock != "" && precio != "" && url != ""){
		respuesta = true;
	}	
	return respuesta;
}

function agregarItemDetalle(){
	$("#agregar-item").on("click", function(){
		tabla_detalle = $('#dt_detalleproducto').DataTable({
			"destroy":true,
			"columns":[
				{"data":"idproducto", visible: false},
				{"data":"idmodelo", visible: false},
				{"data":"idtalla", visible: false},
				{"data":"idcolor", visible: false},
				{"data":"modelo"},
				{"data":"talla"},
				{"data":"color"},				
				{"data":"stock"},
				{"data":"precio"},
				{"data":"imagen"},
				{"data":"urlimagen"},
				{"defaultContent": `<button class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i></button>`}
			],
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": false,
			"info": false,
			"autoWidth": false
		});

		if( validarCampos() ){
			$("#dt_detalleproducto").removeClass("ocultar");
			var imagen = $("#url_imagen").val();
			var fila =	{						
				        idproducto: $("#id_producto").val(),
				        idmodelo: $("#idmodelo").val(),
				        idtalla: $("#idtalla").val(),
				        idcolor: $("#idcolor").val(),
				        modelo: $("#idmodelo option:selected").text(),
				        talla: $("#idtalla option:selected").text(),
				        color: $("#idcolor option:selected").text(),
				        imagen: "<a href='"+imagen+"' target='_blank' ><img src='"+imagen+"' width='80' height='50' /></a>",
				        urlimagen: imagen,
				        stock: $("#stock").val(),
				        precio: $("#precio").val()			    	
				    };
			tabla_detalle.row.add( fila ).draw();

		}else{
			alert("Llenar los datos solicitados");
		}
		eliminarItemDetalle("#dt_detalleproducto tbody", tabla_detalle);		
	});
}

function eliminarItemDetalle(tbody, table){
	$(tbody).on('click', 'button.eliminar', function(){
    	table.row( $(this).parents('tr') )
        	 .remove();
        table.draw();
	});
}

function obtenerDataDetalleProducto(table){
		var detalle = table.rows().data();
		var productos = [], json = "";
		//console.log( data );

		for( var i=0; i < detalle.length; i++ ){
			var item = {
				idproducto : detalle[i].idproducto,
				idmodelo : detalle[i].idmodelo,
				idcolor : detalle[i].idcolor,
				idtalla : detalle[i].idtalla,
				urlimagen : detalle[i].urlimagen,
				precio : detalle[i].precio,
				stock : detalle[i].stock,
			};
			productos.push( item );
		}

		json = {data: productos};

		return JSON.stringify(json);//convierte a una cadena
}

function guardarAsignacion(){
	//datos de la tabla
	var productos = [];
	$("#frmguardardetalleproducto").on("submit", function(e){
		e.preventDefault();
		/*El producto ingresado, solo se podrá editar( cambiar categoria, descripción), siempre y cuando
		tenga un estado (0,1,2) de recien ingresado, caso contrario, saldrá
		un mensaje diciendo que a ese producto, ya se le asignaron
		talla, color, etc.*/
		var controller = $(this).attr("action"),
			opcion = $("#frmguardardetalleproducto #opcion").val(),
			data = obtenerDataDetalleProducto( tabla_detalle);
		console.log( data );// esta data se enviará a PHP servirdor

		$.ajax({
			method: "POST",
			url: "../src/"+controller+".php",
			data: {opcion: opcion, items: data}
		}).done(function( info ){
			mensajes( info );
			limpiarCampos();
			console.log( info );
		});
	});	
}

function limpiarCampos(){
	$("#buscar_dt_producto").empty();
	$("#dt_detalleproducto").empty();
	$("#descripcion").val("");
	$("#categoria").val("");
	$("#url_imagen").val("");
	$("#stock").val("");
	$("#precio").val("");
	var option = "<option> Seleccionar </option>";
	$("#idmodelo").html(option);
	$("#idtalla").html(option);
	$("#idcolor").html(option);

}

function llenarComboColor(accion, idcategoriaproducto){
	$.ajax({
		method: "POST",
		url: "../src/color/ColorController.php",
		data: {opcion:"combo"}
	}).done( function( info ){
		var color = JSON.parse( info ),
			option = "";
		$("#idcolor").html("");//limpiar el combo
		option +=`<option> Seleccionar </option>`;

		if( accion == "registrar" ){			
			for(i in color.data )
				option +=`<option value="${color.data[i].idcolor}"> ${color.data[i].nombre} </option>`;
			
		}else if( accion == "modificar" ){
			for(i in color.data ){
				if( idcolor == color.data[i].idcolor )
					option += `<option selected value="${color.data[i].idcolor}"> ${color.data[i].nombre} </option>`;
				else option +=`<option value="${color.data[i].idcolor}"> ${color.data[i].nombre} </option>`;
			}
		}

		$("#idcolor").html(option);
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
			
		}else if( accion == "modificar" || accion == "visualizar"){
			for(i in categoria.data ){
				if( idcategoriaproducto == categoria.data[i].idcategoriaproducto )
					option += `<option selected value="${categoria.data[i].idcategoriaproducto}"> ${categoria.data[i].descripcion} </option>`;
				else option +=`<option value="${categoria.data[i].idcategoriaproducto}"> ${categoria.data[i].descripcion} </option>`;
			}
		}
		$("#visualizar-idcategoriaproducto").html(option);
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
			
		}else if( accion == "modificar" || accion == "visualizar"){
			for(i in tela.data ){
				if( idtela == tela.data[i].idtela )
					option += `<option selected value="${tela.data[i].idtela}"> ${tela.data[i].descripcion} </option>`;
				else option +=`<option value="${tela.data[i].idtela}"> ${tela.data[i].descripcion} </option>`;
			}
		}

		$("#idtela").html(option);
		$("#visualizar-idtela").html(option);
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
