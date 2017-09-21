<?php 

	include '../src/cliente/Cliente.php';//incluir esta la entidad para poder mostrar los datos

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
    //comprobamos si la sesion contiene algún dato.
    $arreglo = isset($_SESSION['cliente']) ? $_SESSION['cliente'] : "";
    
    if($arreglo){
    	$idcliente = $arreglo[0]->getIdcliente();
	    $paterno = $arreglo[0]->getApellidopaterno();
	    $materno = $arreglo[0]->getApellidomaterno();    	
    }else{
    	$idcliente = "";
    	$paterno = "";
	    $materno = ""; 
    }

 ?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>

<body>
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
		    <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Iniciar Sesión </a></li>
			<li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Registrarse </a></li>
			<!--<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>-->
			<input type="hidden" id="idcliente" name="idcliente" value=" <?php echo $idcliente; ?> ">
			<li><i class="fa fa-user"></i> <?php echo $paterno." ".$materno; ?> </li>
			<li>
				<form action="../src/cliente/ClienteController.php" method="post">
					<input type="hidden" id="opcion" name="opcion" value="cerrarsesion">
					<button class="btn btn-default" type="submit">Cerrar Sesión</button>
				</form>
			</li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
			<form action="#" method="post">
					<input type="search" name="search" placeholder="Search here..." required="">
					<input type="submit" value=" ">
				<div class="clearfix"></div>
			</form>
		</div>

		<div class="col-sm-4 men-wear-left">
					<img class="img-responsive" src="images/logo.png" alt=" ">
				</div>
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1><a href=""> <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
			</div>
        <!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">
						
						
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="index.php">Inicio <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="about.html">Acerca De</a></li>
					<li class="menu__item">
						<a href="categoria.php" class="menu__link">Categorias</a>
							<!--<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<!--<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="mens.html"><img src="images/top2.jpg" alt=" "/></a>
									</div>
									
									<div class="col-sm-6 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="mens.html">Jewellery</a></li>
											<li><a href="mens.html">Sunglasses</a></li>
											<li><a href="mens.html">Perfumes</a></li>
											<li><a href="mens.html">Beauty</a></li>
											<li><a href="mens.html">Shirts</a></li>
											<li><a href="mens.html">Sunglasses</a></li>
											<li><a href="mens.html">Swimwear</a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>-->
					</li>
					<li class="menu__item dropdown">
					   <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Codigos Corto <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="icons.html">Iconos de la Web</a></li>
									<li><a href="typography.html">Tipogrfia</a></li>
								</ul>
					</li>
					<li class=" menu__item"><a class="menu__link" href="contact.html">Contacto</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
						<form id="frmCarritoCompras" action="#" method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<!-- Hacer una función con onclick para que se rediriga a la página de carrito-compras.php -->
						<button class="w3view-cart" id="btnCarrito" type="submit" value=""><i class="fa fa-cart-arrow-down"></i></button>
					</form>  
  
						</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->

<!-- Modal1 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-12 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Iniciar Sesión <span>Ahora</span></h3>
						<form id="frminiciarcliente" action="../src/cliente/ClienteController.php" method="post">
							<input type="hidden" id="opcion" name="opcion" value="acceso">						
							<div class="styled-input">
								<input type="email" id="email" name="email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input agile-styled-input-top">
								<input type="password" id="contrasena" name="contrasena" required="">
								<label>Contraseña</label>
								<span></span>
							</div>
							<input type="submit" value="Iniciar Sesión">
						</form>
						  <!--<ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>-->
														<!--<div class="clearfix"></div>
														<p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>-->

						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->

<!-- Modal2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-12 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Registrar <span>Ahora</span></h3>
						 <form action="frmregistrarcliente" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="">
								<label>Nombres</label>
								<span></span>
							</div>
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="">
								<label>Apellido Paterno</label>
								<span></span>
							</div>
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="">
								<label>Apellido Materno</label>
								<span></span>
							</div>
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="">
								<label>Dni</label>
								<span></span>
							</div>
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="">
								<label>Dirección</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" id="email" name="email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" id="contrasena" name="contrasena" required=""> 
								<label>Contraseña</label>
								<span></span>
							</div> 
							<input type="submit" value="Registrar">
						</form>
						  <!--<ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>-->
														<!--<div class="clearfix"></div>
														<p><a href="#">By clicking register, I agree to your terms</a></p>-->

						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->