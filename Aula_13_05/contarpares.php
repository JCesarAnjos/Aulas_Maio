<?php require_once 'cabecalho.php'; 
/*
$numero=0;  
while($numero<=100){
	echo "<p class='resposta'>$numero</p>";
	$numero+=2;
}

*/
?>
<form action="contarpares.php" method="GET">
	<h1>Contar Pares</h1>
	<p>Início:<input type="number" name="inicio" min="0" max="100" step="2" required></p>
	<p>Fim:<input type="number" name="fim" min="0" max="100" step="2" required></p>
	<p><input type="submit" name="botao" value="Contar"></p>
</form>
<?php
	if (isset($_GET['botao'])) {
		$inicio=$_GET['inicio'];
		$fim=$_GET['fim'];

		//verificar se são pares
		if($inicio%2==0&&$fim%2==0){
			//verificar se são iguais
			if($inicio==$fim){
				echo "<h2>Os números devem ser diferentes!</h2>";
			}else{
				//descobrir onde é o começo e onde é o fim
				if($inicio<$fim){
					$contador=$inicio;
					while ($contador<=$fim) {
						echo "<p class='resposta'>$contador</p>";
						$contador+=2;
					}
				}else{
					$contador=$inicio;
					while($contador>=$fim){
						echo "<p class='resposta'>$contador</p>";
						$contador-=2;
					}
				}
			}
		}else{
						echo "<h2>Os números devem ser pares!</h2>";
		}
		}
	


?>
</body>
</html>