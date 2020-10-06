<?php 
// Definimos una constante de la ruta de nuestro Blog
define('RUTA', 'http://localhost:8888/curso_php/14%20Blog');

$bd_config = array (
	'basedatos' => 'blog',
	'usuario'   => 'root',
	'pass'      => 'root'
);

$blog_config = array (
	'post_por_pagina'  => '2',
	'carpeta_imagenes' => 'imagenes/'
);
// Vamos a simular un usuario y password del admin aunque podriamos tambien obtenerlos de la base de datos.
$blog_admin = array (
	'usuario'  => 'admin',
	'password' => 'admin'
);


?>