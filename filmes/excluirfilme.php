<?php
require_once 'cabecalho.php';

if(isset($_POST['excluir'])){
	require_once 'persistence/FilmePA.php';
	$filmepa=new FilmePA();
	$consulta=$filmepa->buscarPorCodigo($_POST['excluir']);
	$linha=$consulta->fetch_assoc();
?>
<form action="excluirfilme.php" method="POST" class="formulario">
	<h1>Excluir</h1>
	<p>Tem certeza que deseja excluir o:</p>
	<p><?= $linha['titulo'] ?> ?</p>
	<input type="hidden" name="cod_fil" value="<?= $linha['cod_fil'] ?>">
	<p><input type="submit" name="botao" value="Sim">
		<a class="botao" href="menufilme.php">Não</a></p>
</form>
<?php
}else if (isset($_POST['botao'])){
	require_once 'model/Filme.php';
	require_once 'persistence/FilmePA.php';
	require_once 'persistence/Cat_filmesPA.php';
	$filme=new Filme();
	$filmepa=new FilmePA();
	$cat_filmespa=new Cat_filmesPA();
	$filme->setCod_fil($_POST['cod_fil']);
	if (!$cat_filmespa->excluirPorFilme($filme)){
		echo "<h2>Erro na tentativa de excluir categorias!</h2>";
	}else{
		if ($filmepa->excluir($filme)){
			echo "<h2>Filme excluido com sucesso!</h2>";
		}else{
			echo "<h2>Erro na tentativa de excluir Filme!</h2>";
		}
	}
}
?>
</body>
</html>