<?php

require 'admin/config.php';
require 'functions.php';

$conexion    = conexion($bd_config);
$id_articulo = (int)limpiarDatos($_GET['id']);

if (!$conexion) {
	header('Location: error.php');
}

if (empty($id_articulo)) {
	header('Location: index.php');
}

$post = obtener_post_por_id($conexion, $id_articulo);

if (!$post) {
	// Redirigimos al index si no hay post
	header('Location: index.php');
}
// Como se utiliza fetchAll en la funcion trae un arreglo y solicitamos el primer post que es 0
$post = $post[0];

require 'views/single.view.php';

?>