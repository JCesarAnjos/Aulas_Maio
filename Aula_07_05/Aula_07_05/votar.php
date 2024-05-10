<?php require_once'cabecalho.php'; ?>
<form action="votar.php" method="POST">
	<h1>Votação</h1>
	<p>Digite a data de nascimento:</p>
	<p><input type="date" name="nascimento" min="1950-01-01" max="<?= date("Y-m-d") ?>"></p>
	<p><input type="submit" name="botao" value="Verificar"></p>
</form>
<?php
if (isset($_POST['botao'])){
	$nascimento=$_POST['nascimento'];
	$atual=date("Y-m-d");
	$atual=new DateTime($atual);
	$nascimento=new DateTime($nascimento);
	$diferenca=$atual->diff($nascimento);
	$idade=$diferenca->y;
	if($idade<16){
	echo "<h2>Você não pode votar</h2>";
	}else if($idade>=16&&$idade<=17){
	echo "<h2>Pode votar, não obrigatório!</h2>";
	}else if($idade>=18&&$idade<=70){
	echo "<h2>Obrigatório Votar!</h2>";
	}else if($idade>=71){
	echo "<h2>Voto Facultativo!</h2>";
	}
}
?>
</body>
</html>