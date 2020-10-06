<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Blog José Saldivar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilos.css">
<body>
	<header>
		<div class="contenedor">
			<div class="logo izquierda">
				<p>
					<a href="<?php echo RUTA; ?>">Blog José Saldivar Castañeda</a>
				</p>
			</div>
			<div class="derecha">
				<form class="buscar" name="busqueda" action="<?php echo RUTA; ?>/buscar.php" method="get">
					<input type="text" name="busqueda" placeholder="Buscar">
					<button type="submit" class="icono fa fa-search"></button>
				</form>
				<nav class="menu">
					<ul>
						<li>
							<a href="#"><i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="#">Contacto<i class="icono fa fa-envelope"></i></a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>