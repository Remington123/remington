$(function(){
	//alert("Archivo car.js");
	
	irCarritoCompras();
	listarProductoCompleto();
	listarPorCategoria();
	listarTallasPorColor();
	seleccionarTalla();
	guardarPedido();
});

function guardarPedido(){
	$("#frmguardarpedido").on("submit", function(e){

		e.preventDefault();
		console.log("Formulario guardar Pedido");
		var items = obtenerDataTabla("#tbody_pedidos");
		var total = $("#total").val();
		//var idcliente =  coger sesion
		console.log( total );
		var data = {
			pedido: items,
			total: $("#total").val()
		};
		
		$.ajax({
			method:"POST",
			url: "../src/pedido/PedidoController.php",
			data:{ opcion: "guardar", data: JSON.stringify(data)}
		}).done(function( info ){
			console.log( info );
		});

	});
}


function obtenerDataTabla(tbody){
	var sumarImporte = 0, contador = 0, 
		numeroCampos = 8;//Todos menos el total
	var pedido = [], item = [];
    $(tbody).find('td input.data').each(function (i) {
    	contador++;
        if( contador < numeroCampos ){
        	//console.log("fila "+i+": "+ $(this).val() );
        	item.push( $(this).val() );
        }else{
        	contador = 0;
        	//console.log("fila "+i+": "+ $(this).val() );
        	item.push( $(this).val() );
        	pedido.push( item );
        	item = [];//setear el arreglo data para la siguiente fila
        }
    });
    
    return pedido;
}

function listarTallasPorColor(){
	$("#idcolor").on("change", function(){
		var idcolor = $(this).val(),
			idproducto = $("#idcolor option:selected").attr("data-idproducto"),
			color = $("#idcolor option:selected").text(),
			imagen = $("#idcolor option:selected").attr("data-imagen"),
			img = `<img src="${imagen}" data-imagezoom="true" class="img-responsive">`;
			$(".thumb-image").html("");
			$(".thumb-image").html(img);
			$("#url_imagen").val(imagen);
			$("#color").val( color );
			console.log(imagen);

		$.ajax({
			method: "POST",
			url: "../src/talla/TallaController.php",
			data: {opcion:"comboPorColor", idcolor: idcolor, idproducto: idproducto}
		}).done( function( info ){
			var talla = JSON.parse( info ),
				option = "";
			console.log(talla);
			$("#idtalla").html("");//limpiar el combo
			//option +=`<option> Seleccionar </option>`;
			
			//validar cuando el length de tallas es cero, en talla.descripcion="Sin datos"

			if( talla.data.length == 1 ){
				$("#prenda_precio").val("S/. "+ talla.data[0].precio);
				$("#item_precio").val( talla.data[0].precio );
				$("#item_talla").val( talla.data[0].descripcion );
			}

			//Inicialmente debe llenar cierto datos en los siguientes campos
			$("#prenda_precio").val("S/. "+ talla.data[0].precio);
			$("#item_precio").val( talla.data[0].precio );
			$("#item_talla").val( talla.data[0].descripcion );



			for(i in talla.data )
				option +=`<option data-stock="${talla.data[i].stock}" data-precio="${talla.data[i].precio}" value="${talla.data[i].idtalla}"> ${talla.data[i].descripcion} </option>`;		

			$("#idtalla").html(option);
		});
	});
}

function seleccionarTalla(){
	$("#idtalla").on("change", function(){
		var precio = $("#idtalla option:selected").attr("data-precio"),
			stock = $("#idtalla option:selected").attr("data-stock"),
			talla = $("#idtalla option:selected").text();
			console.log( talla );
			console.log( precio );
			$("#prenda_precio").val("S/. "+precio);
			$("#item_precio").val( precio );
			$("#item_talla").val( talla );//ver porque no jala dato esta mierda

	});
}

function listarPorCategoria(){
	$(".categoria").on("click", function(){
		var idcategoriaproducto = $(this).attr("data-idcategoriaproducto");//enviar por GET el idcategoria y mostrar los productos mens?id=1
		
		if( idcategoriaproducto != "" ){
			if( idcategoriaproducto > 0 && idcategoriaproducto < 6 ){
				
				$.ajax({
					method: "POST",
					url: "../src/producto/ProductoController.php",
					data: {opcion:"listarPorCategoria", idcategoriaproducto: idcategoriaproducto}
				}).done(function( info ){
					var productos = JSON.parse( info ),
						esquema = "";
					console.log( productos );

					$(".producto_categoria").html("");//limpiar el tab2, que corresponde a mujeres
					for(var i in productos.data){
						var objProducto = {
							idproducto : productos.data[i].idproducto,
							descripcion : productos.data[i].descripcion,
							precio : productos.data[i].precio,				
							urlimagen: productos.data[i].urlimagen
						};
						esquema += dibujarEsquemaProducto( objProducto, 4 );
					}
					esquema += `<div class="clearfix"></div>`;//esto sirve como para dar un enter
					$(".producto_categoria").append( esquema );
				});

			}else{
				alert("No existe la categoria.")
			}
		}else{
			alert("Valor de la categoría esta vacio.");
		}

	});
}

function listarProductoCompleto(){

	$.ajax({
		method: "POST",
		url: "../src/producto/ProductoController.php",
		data: {opcion:"listarProductoCompleto"}//mandar tipousuario, de acuerdo al tab escogido, poner un "id" a cada tab
	}).done(function( info ){
		var productos = JSON.parse( info ),
			esquema = "";
		console.log( productos );
		$(".tab1").html("");//limpiar el tab2, que corresponde a mujeres
		for(var i in productos.data){
			var objProducto = {
				idproducto : productos.data[i].idproducto,
				descripcion : productos.data[i].descripcion,
				precio : productos.data[i].precio,				
				urlimagen: productos.data[i].urlimagen
			};
			esquema += dibujarEsquemaProducto( objProducto, 3 );
		}
		esquema += `<div class="clearfix"></div>`;//esto sirve como para dar un enter
		$(".tab1").append( esquema );
	});
}

function dibujarEsquemaProducto( objProducto, col ){
	var producto = `<div class="col-md-${col} product-men">
						<div class="men-pro-item simpleCart_shelfItem">
							<div class="men-thumb-item">
								<img src="${objProducto.urlimagen}" alt="" class="pro-image-front">
								<img src="${objProducto.urlimagen}" alt="" class="pro-image-back">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<!--<a href="#" class="link-product-add-cart">Quick View</a>-->
										</div>
									</div>
									<!--<span class="product-new-top">New</span>-->
									
							</div>
							<div class="item-info-product ">										
								<h4><a href="#">${objProducto.descripcion}</a></h4>
								<div class="info-product-price">
									<span class="item_precio">S/. ${objProducto.precio}</span>											
									<!--<span class="item_price">Precio nuevo: $130.99</span>
									<del>->Precio Anterior: $169.71</del>-->
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
									<form action="prenda.php" method="post">
										<fieldset>
											<input type="hidden" name="opcion" value="listarProductoDetallePorId" />
											<input type="hidden" name="idproducto" value="${objProducto.idproducto}">
											<input type="hidden" name="descripcion" value="${objProducto.descripcion}">
											<input type="hidden" name="precio" value="${objProducto.precio}">
											<input type="hidden" name="urlimagen" value="${objProducto.urlimagen}">
											<input type="hidden" name="cantidad" value="1">
											<input type="hidden" name="importe" value="0">
											<input type="submit" value="Comprar" class="button" />
										</fieldset>
									</form>
								</div>																			
							</div>
						</div>
					</div>`;
	return producto;//en action poner prenda.php
}

/*function loginCliente(){
	$("#frminiciarcliente").on("submit", function(e){
		e.preventDefault();
		var frm = $(this).serialize();
		console.log( frm );
		var controller = $(this).attr("action");
		console.log(controller);
		$.ajax({
			method:"POST",
			url:"../src/"+controller,
			data: frm
		}).done( function(info){
			console.log( info );
		});
	});
}*/


function irCarritoCompras(){
	$("#btnCarrito").on("click", function(e){
		e.preventDefault();
		window.location = "carrito-compras.php";
	});
}