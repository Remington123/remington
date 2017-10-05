<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pasarela de Pago</title>
</head>
<body>



<div class="container">
	<div class="row">
		<div class="col-sm-12">
			//Aquí creamos el formulario de captura de la tarjeta
	    <form action="" method="POST" id="culqi-card-form">
		   <div>
		        <label>
		         <span>Correo Electrónico</span>
		      <input type="text" size="50" name="email" data-culqi="card[email]" id="card[email]">
		    </label>
		  </div>
		  <!--<input type="hidden" id="cliente_email" name="cliente_email" value="">-->
		  <div>
		    <label>
		      <span>Número de tarjeta</span>
		      <input type="text" size="20" data-culqi="card[number]"  id="card[number]">
		    </label>
		  </div>
		  <div>
		    <label>
		      <span>CVV</span>
		      <input type="text" size="4" data-culqi="card[cvv]" id="card[cvv]">
		    </label>
		  </div>
		  <div>
		    <label>
		      <span>Fecha expiración (MM/YYYY)</span>
		      <input type="text" size="2" data-culqi="card[exp_month]" id="card[exp_month]">
		    </label>
		    <span>/</span>
		    <input type="text" size="4" data-culqi="card[exp_year]" id="card[exp_year]">
		  </div>
		  <div>
		  	<button type="submit" name="enviar">Pagar</button>
		  </div>
		</form>

		<!-- Incluyendo .js de Culqi-->
		<script src="https://checkout.culqi.com/v2"></script>
		
		<script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>

		<script src="js/pago.js" ></script>
		
		<script>		

			$(function(){
				Culqi.publicKey = 'pk_test_PnizAP8dlMp7uAXV';
				Culqi.init();
				pagar();
			});

		</script>
		
		</div>
	</div>
</div>



</body>
</html>