<?php require_once 'cabecalho.php'; ?>
<form action="senha.php" method="POST">
	<h1>Senha</h1>
	<p>Digite a Senha:<input type="text" name="senha" required></p>
	<p><input type="submit" name="botao" value="Entrar"></p>
</form>
<?php 
	if (isset($_POST['botao'])) {
		$senha=$_POST['senha'];
		if($senha=="SENAC"){
			echo "<h2> ACESSO PERMITIDO</h2>";
		}else if($senha!="SENAC"){
			echo "<h2> ACESSO NEGADO</h2>";
	}
}
?>
</body>
</html>

