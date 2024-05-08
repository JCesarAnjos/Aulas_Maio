<?php require_once 'cabecalho.php'; ?>
<form action="parouimpar.php" method="GET">
	<h1>Par ou Ímpar?</h1>
	<p>Digite um número:<input type="number" name="numero" required></p>
	<p><input type="submit" name="botao" value="Verificar"></p>
</form>
<?php
if (isset($_GET['botao'])) {
	$numero=$_GET['numero'];
	if ($numero%2==0) {
		echo "<h2>$numero é Par!</h2>";
	}else{
		echo "<h2>$numero é Ímpar!</h2>";
	};
};
	
?>
</body>
</html>
