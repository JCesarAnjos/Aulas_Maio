<?php require_once'cabecalho.php'; ?>
<form action="numeros.php" method="GET">
	<h1>Ler Números</h1>
	<p>Digite o primeiro número:<input type="number" name="numero1" required></p>
	<p>Digite o segundo número:<input type="number" name="numero2" required></p>
	<p>Digite o terceiro número:<input type="number" name="numero3" required></p>
	<p><input type="submit" name="numeros" value="comparar"></p>
</form>
<?php
if (isset($_GET['numeros'])) {
	$numero1=$_GET['numero1'];
	$numero2=$_GET['numero2'];
	$numero3=$_GET['numero3'];
	if ($numero1>$numero2&&$numero1>$numero3){
		echo "<h2>$numero1 é o Maior!</h2>";
	}else if($numero2>$numero1&&$numero2>$numero3){
		echo "<h2>$numero2 é o Maior!</h2>";
	}else if($numero3>$numero1&&$numero3>$numero2){
		echo "<h2>$numero3 é o Maior!</h2>";
	}else if($numero1==$numero2||$numero1==$numero3||$numero2==$numero3){
		echo "<h2>Tem números iguais!</h2>";
	}
}

?>
</body>
</html>