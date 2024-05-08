<?php require_once 'cabecalho.php'; ?>
<form action="calculadora.php" method="GET">
	<h1>Calculadora</h1>
	<p>Digite um número:
		<input type="number" name="numero" required></p>
	<p>Digite outro número:
		<input type="number" name="numero2" required></p>
	<p>Operação:</p>
	<p><input type="radio" name="operacao" value="soma">+
	   <input type="radio" name="operacao" value="menos">-
	   <input type="radio" name="operacao" value="produto">x
	   <input type="radio" name="operacao" value="divisao">&divide;
	</p>
	<p><input type="submit" name="botao" value="calcular"></p>
</form>
<?php
	if (isset($_GET['botao'])) {
		$numero=$_GET['numero'];
		$numero2=$_GET['numero2'];
		$operacao=$_GET['operacao'];

		if($operacao=="soma"){
			$resultado=$numero+$numero2;
		}else if($operacao=="menos"){
			$resultado=$numero-$numero2;
		}else if($operacao=="produto"){
			$resultado=$numero*$numero2;
		}else{
			$resultado=$numero/$numero2;
		}
		echo "<h2>$resultado</h2>";
	}




?>
</body>
</html>

	 
