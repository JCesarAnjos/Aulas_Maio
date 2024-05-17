<?php require_once 'cabecalho.php'; ?>
<form action="produto.php" method="GET">
	<h1>Produto</h1>
	<p>Número Inicial:<input type="number" name="inicio" name="numero" required></p>
	<p>Número Final:<input type="number" name="fim" name="numero" required></p>
	<p><input type="submit" name="botao" value="Mostrar"></p>
</form>
<?php
	if (isset($_GET['botao'])) {
		$inicio=$_GET['inicio'];
		$fim=$_GET['fim'];
		$produto=1;
		$contador=$inicio;
		if($inicio<$fim){
		while($contador<=$fim){
			$produto=$produto*$contador;
			$contador++;
		}
				echo "<p class='resposta'> Produto $produto</p>";
		}else{
			while($contador>=$fim){
			$produto=$produto*$contador;
			$contador--;
		}
			echo "<p class='resposta'> Produto $produto</p>";
		}
		}
		
?>
</body>
</html>