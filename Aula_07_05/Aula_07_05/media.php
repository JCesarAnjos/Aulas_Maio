<?php require_once'cabecalho.php'; ?>
<form action="media.php" method="POST">
	<h1>Media</h1>
	<p>Digite o nome do aluno:<input type="text" name="nome" required></p>
	<p>Digite a nota do primeiro bimestre:<input type="number" name="nota1" min="0" max="100" required></p>
	<p>Digite a nota do segundo bimestre:<input type="number" name="nota2" min="0" max="100" required></p>
	<p>Digite a nota do terceiro bimestre:<input type="number" name="nota3" min="0" max="100" required></p>
	<p><input type="submit" name="botao" value="Calcular Média"></p>
</form>
<?php
if (isset($_POST['botao'])){
	$nota1=$_POST['nota1'];
	$nota2=$_POST['nota2'];
	$nota3=$_POST['nota3'];
	$media=($nota1+$nota2+$nota3)/3;
	if($media<60){
	echo "<h2>Reprovado!</h2>";
	}else if($media>=60){
	echo "<h2>Aprovado!</h2>";
	}
}
?>
</body>
</html>