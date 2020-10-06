<?php

	# Funcion para conectarnos a la base de datos.
	# Return: la conexion o false si hubo un problema.
	function conexion($bd_config){
		try {
		$conexion = new PDO('mysql:host=localhost:8889;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $conexion;

		} catch (PDOException $e) {
			return false;		
		}
	}

	# Funcion para limpiar y convertir datos como espacios en blanco, barras y caracteres especiales en entidades HTML.
	# Return: los datos limpios y convertidos en entidades HTML.
	function limpiarDatos($datos){

		// Eliminamos los espacios en blanco al inicio y final de la cadena
		$datos = trim($datos);

		// Quitamos las barras / escapandolas con comillas
		$datos = stripslashes($datos);

		// Convertimos caracteres especiales en entidades HTML (&, "", '', <, >)
		$datos = htmlspecialchars($datos);
		return $datos;
	}

	# Funcion para obtener la pagina actual
	# Return: El numero de la pagina si esta seteado, sino entonces retorna 1.

	function pagina_actual(){
		return isset($_GET['p']) ? (int)$_GET['p']: 1; 
	}

	function numero_paginas($post_por_pagina, $conexion) {
		$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
		$total_post->execute();
		$total_post = $total_post->fetch()['total'];

		$numero_paginas = ceil($total_post / $post_por_pagina);
		return $numero_paginas;
	}

	function obtener_post($post_por_pagina, $conexion){

		//1.- Obtenemos la pagina actual
		// $pagina_actual = isset($_GET['p']) ? (int)$_GET['p']: 1;
		// Para reutilizar el codigo creamos una funcion que nos dice la pagina actual.

		//2.- Determinamos desde que post se mostrara en pantalla
		$inicio = (pagina_actual() > 1) ? (pagina_actual() * $post_por_pagina - $post_por_pagina) : 0;

		//3.- Preparamos nuestra consulta trayendo la informacion e indicandole desde donde y cuantas filas.
		// Ademas le pedimos que nos cuente cuantas filas tenemos.
		$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT {$inicio}, {$post_por_pagina}");

		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	function id_articulo($id){
		return (int)limpiarDatos($id);
	}

	function obtener_post_por_id($conexion, $id){
		$resultado = $conexion->query("SELECT * FROM articulos WHERE id=$id LIMIT 1");
		$resultado = $resultado->fetchAll();
		return($resultado) ? $resultado : false;
	}

	function fecha($fecha){
		$timestamp = strtotime($fecha);
		$meses = ['Enero' , 'Febrero' , 'Marzo', 'Abril', 'Mayo' , 'Junio' , 'Julio' , 'Agosto' , 'Septiembre' , 'Octubre' , 'Noviembre' , 'Diciembre'];

		$dia = date('d', $timestamp);
		$mes = date('m', $timestamp)-1;
		$año = date('Y', $timestamp);

		$fecha = "$dia de " . $meses[$mes] . " de $año";
		return $fecha;
	}

	function comprobarSession(){
		if(!isset($_SESSION['admin'])){
			header('Location: ' . RUTA);
		}
	}
?>