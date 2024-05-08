<?php require_once'cabecalho.php'; ?>
<form action="escola.php" method="GET">
	<h1>Classificação de Alunos</h1>
	<p>Digite o nome do aluno:<input type="text" name="nome" required></p>
	<p>Digite o ano de nascimento do aluno:<input type="number" name="anodenascimento" required></p>
	<p><input type="submit" name="classificacao" value="Classificar"></p>
</form>
<?php
if (isset($_GET['classificacao'])){
	$nascimento=$_GET['anodenascimento'];
	$idade=2024-$nascimento;
	$nome=$_GET['nome'];
	if ($idade>=6&&$idade<=9) {
		echo "<h2>$nome tem $idade e é classificado como Baby Shark!</h2>";
	}else if($idade>=10&&$idade<=12){
		echo "<h2>$nome tem $idade e é classificado como Peixe!</h2>";
	}else if($idade>=13&&$idade<=15){
		echo "<h2>$nome tem $idade e é classificado como Bagre!</h2>";
	}else if($idade>=16&&$idade<=18){
		echo "<h2>$nome tem $idade e é classificado como Peixe Espada!</h2>";
	}else if($idade>=18){
		echo "<h2>$nome tem $idade e é classificado como Tubarão!</h2>";
	}}
?>
</body>
</html>