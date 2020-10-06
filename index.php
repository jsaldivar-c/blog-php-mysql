<?php

require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

if (!$conexion) {
	header('Location: error.php');
}

// Obtenemos los post
// En este caso se envia a la funcion por parametros un 2 y la conexion
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

// Si no hay post entonces redirigimos
if(!$posts){
	header('Location: error.php');
}

require 'views/index.view.php';

?>