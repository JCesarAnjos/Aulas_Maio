<?php
require_once 'cabecalho.php';
require_once 'persistence/FilmePA.php';
require_once 'model/Filme.php';
$filmepa=new FilmePA();
$consulta=$filmepa->listar(5,0);
if (!$consulta){
	echo "<h2>Bem Vindo ao Filmes!</h2>";
}