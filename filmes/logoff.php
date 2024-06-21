<?php

if (isset($_COOKIE['administrador'])) {
	require_once 'model/Administrador.php';
	$administrador=new Administrador();
	$administrador->deslogar();
	header('Location:index.php');
}else if(isset($_COOKIE['usuario'])){
	require_once 'model/Usuario.php';
	$usuario=new Usuario();
	$usuario->deslogar();
	header('Location:index.php');
}

?>