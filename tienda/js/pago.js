

function culqi() {
    if(Culqi.token) { // ¡Token creado exitosamente!
        // Get the token ID:
        var token = Culqi.token.id,
        	test_token = Culqi.token;
        console.log('Se ha creado un token:' + token);
        console.log(test_token);

        console.log( $("#monto").val() );
        console.log( $("#cliente_email").val() );

        console.log("Formulario guardar Pedido");
		var items = obtenerDataTabla("#tbody_pedidos");
		var total = $("#total").val(),
			email = $("#email").val(),
			//mensajecorreo = $("#mensajecorreo").val();
			idcliente =  $("#idcliente").val();

		console.log( idcliente );

		console.log( email );
		//console.log( mensajecorreo );
		var data = {
			pedido: items,
			total: $("#total").val(),
			idcliente: idcliente
		};

		email_culqui = $("input[name='email']").val();

        $.ajax({
        	method: "POST",
        	url: "servidorpago.php",
        	data:{
        		token: token,
        		monto: total.trim(),
        		email : email_culqui.trim()
        	},
        	type: "JSON"
        }).done( function( info ){
        	var json = JSON.parse( info );
        	console.log( json );
        	var codigoReferencia = "sin pagar";
        	if( json.capture == true ){
        		codigoReferencia = json.reference_code;
        		guardarPedido( data, email );//llamando a la función guardar pedido
        	}
        	console.log( codigoReferencia );
        });

    }else{ // ¡Hubo algún problema!
        // Mostramos JSON de objeto error en consola
        console.log(Culqi.error);
        alert(Culqi.error.user_message);
    }
};

function pagar(){
	$("#frmguardarpedido").on("submit", function(e){
		e.preventDefault();
		Culqi.createToken();
		console.log("Pago Culqi");
	});
}

function guardarPedido( data, email ){

		
		$.ajax({
			method:"POST",
			url: "../src/pedido/PedidoController.php",
			data:{ opcion: "guardar", data: JSON.stringify(data)}
		}).done(function( info ){
			var json = JSON.parse( info );

			if( json.respuesta == "bien" ){
				enviarCorreo(email);
			}

			console.log( info );
						
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

function enviarCorreo(email){
	$.ajax({
		method:"POST",
		url: "enviarCorreo.php",
		data:{ email: email}
	}).done(function( info ){
		console.log( info );
		window.location = "realizar-compra.php";
	});
}