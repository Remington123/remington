$(function(){
	//alert("Archivo car.js");
	irCarritoCompras();
	listarProductosMujeres();
});

function listarProductosMujeres(){
	/*se va a cambiar esta parte de listado sin tipo, por prodocuto
	y en la pagina del producto solo, se va a listar por detalleproducto 
	de acuerdo al id producto seleccionado , para que muestre 
	las tallas, foto(s), colores, modelo, cantidad disponible
	-hacer un combo de colores y de acuerdo a eso, mostrar las tallas disponibles.
	-con el combo de colores, también cambiar las imágenes con dicho color.
	-hacer validación de stock, de acuerdo al color y la talla elegida:
	 si hay stock, entonces aparece el boton de agregar al carro, si no, debe mostrarse
	 un mensaje de: stock agotado.	
	 */

	$.ajax({
		method: "POST",
		url: "../src/producto/ProductoController.php",
		data: {opcion:"listarPorTipo", tipousuario:"mujer"}//mandar tipousuario, de acuerdo al tab escogido, poner un "id" a cada tab
	}).done(function( info ){
		var productos = JSON.parse( info ),
			esquema = "";
		console.log( productos );
		$(".tab2").html("");//limpiar el tab2, que corresponde a mujeres
		for(var i in productos.data){
			var objProducto = {
				idproducto : productos.data[i].idproducto,
				descripcion : productos.data[i].descripcion,
				precio : productos.data[i].precioventa,
				precioanterior: 0,//llenar después
				urlimagen: ""
			};
			esquema += dibujarEsquemaProducto( objProducto );
		}
		esquema += `<div class="clearfix"></div>`;//esto sirve como para dar un enter
		$(".tab2").append( esquema );		
	});
}

function dibujarEsquemaProducto( objProducto ){
	var producto = `<div class="col-md-3 product-men">
						<div class="men-pro-item simpleCart_shelfItem">
							<div class="men-thumb-item">
								<img src="images/w8.jpg" alt="" class="pro-image-front">
								<img src="images/w8.jpg" alt="" class="pro-image-back">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="#" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
									<span class="product-new-top">New</span>
									
							</div>
							<div class="item-info-product ">										
								<h4><a href="#">${objProducto.descripcion}</a></h4>
								<div class="info-product-price">
									<span class="item_precio">S/. ${objProducto.precio}</span>											
									<!--<span class="item_price">Precio nuevo: $130.99</span>
									<del>->Precio Anterior: $169.71</del>-->
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
									<form action="../src/detallepedido/DetallePedidoController.php" method="post">
										<fieldset>
											<input type="hidden" name="opcion" value="agregarItem" />
											<input type="hidden" name="idproducto" value="${objProducto.idproducto}">
											<input type="hidden" name="descripcion" value="${objProducto.descripcion}">
											<input type="hidden" name="precio" value="${objProducto.precio}">
											<input type="hidden" name="cantidad" value="1">
											<input type="hidden" name="importe" value="0">
											<input type="submit" name="btnAgregar" value="Agregar" class="button" />
										</fieldset>
									</form>
								</div>																			
							</div>
						</div>
					</div>`;
	return producto;
}

function irCarritoCompras(){
	$("#frmCarritoCompras").on("submit", function(e){
		e.preventDefault();
		window.location = "carrito-compras.php";
	});
}