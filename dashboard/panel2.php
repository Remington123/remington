	<!--php include 'helperhtml/header.php' -->
	<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.css"/>
</head>
	<body>	
		<div class="container">
			<div class="row">
				<ul class="list-unstyled">
					<li><a href="" data-page="cliente/registrar.php" class="btn btn-success">Registrar</a></li>
					<li><a href="" data-page="cliente/listar.php" class="btn btn-success">Listar</a></li>	
				</ul>
			</div>
		</div>
		
		<div class="row" id="showpage">
			<!--Aquí, se mostrarán todas las páginas-->
		</div>
		<!--php include '../views/modules/cliente/registrar.php' -->

		<!--php include 'helperhtml/footer.php' -->
		
		<footer>
			<div class="row">
				<div class="col-sm-4">Información</div>
				<div class="col-sm-4">Social Media</div>
				<div class="col-sm-4">Contacto</div>
			</div>
		</footer>

		<script	  src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>
		<script src="js/general.js"></script>

		<!--Emplear solo scripts JS necesarios-->
		<div id="myscripts">
			<!--<script src="../views/modules/cliente/js/cliente.js"></script>-->
		</div>
	</body>
	</html>