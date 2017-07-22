	<?php include 'helperhtml/header.php' ?>
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

		<?php include 'helperhtml/footer.php' ?>
		<!--Emplear solo scripts JS necesarios-->
		<div id="myscripts">
		<!--<script src="../views/modules/cliente/js/cliente.js"></script>-->
		</div>
	</body>
</html>