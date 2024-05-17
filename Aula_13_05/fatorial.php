<?php require_once 'cabecalho.php'; ?>
<form action="fatorial.php" method="GET">
	<h1>Fatorial</h1>
	<p>Número:<input type="number" name="numero" name="numero" required></p>
	<p><input type="submit" name="botao" value="Mostrar"></p>
</form>
<?php
	if (isset($_GET['botao'])) {
		$numero=$_GET['numero'];
		$resultado=1;
		echo "<h2> Fatorial $numero</h2>";
		for($contador=$numero;$contador>=1;$contador--){
			$resultado=$resultado*$contador;
		}
				echo "<p class='resposta'> Fatorial $resultado<p/>";
		}
		
?>
</body>
</html>

$media=$media+contador