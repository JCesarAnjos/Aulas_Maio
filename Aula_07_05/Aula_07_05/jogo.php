<?php require_once 'cabecalho.php'; ?>
<form action="jogo.php" method="POST">
	<h1>JOGO</h1>
	<p>Digite o número de GOLS do time A<input type="number" name="golsa" min="0" required></p>
	<p>Digite o número de GOLS do time B<input type="number" name="golsb" min="0" required></p>
	<p><input type="submit" name="botao" value="Verificar">
</form>
<?php
	if(isset($_POST['botao'])){
		$golsa=$_POST['golsa'];
		$golsb=$_POST['golsb'];
		if ($golsa>$golsb){
			echo "<h2> Time A é o vencedor";
		}else if($golsb>$golsa){
			echo "<h2> Time B é o vencedor";
		}else if($golsa==$golsb){
			echo "<h2> EMPATE </h2>";
		}
	}

?>
</body>
</html>