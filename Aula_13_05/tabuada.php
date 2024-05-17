<?php require_once 'cabecalho.php'; ?>
<form action="tabuada.php" method="GET">
	<h1>Tabuada</h1>
	<p>Número:<input type="number" name="numero" name="numero" required></p>
	<p><input type="submit" name="botao" value="Mostrar"></p>
</form>
<?php
	if (isset($_GET['botao'])) {
		$numero=$_GET['numero'];
		echo "<h2>Tabuada do $numero</h2>";
		for($contador=1;$contador<=10;$contador++){
			$resultado=$numero*$contador;
			echo "<p class= 'resposta'>$numero x $contador = $resultado</p>";
		}
	}





?>
</body>
</html>