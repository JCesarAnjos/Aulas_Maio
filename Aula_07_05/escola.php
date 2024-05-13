<?php require_once'cabecalho.php'; ?>
<form action="escola.php" method="POST">
	<h1>Classificação de Alunos</h1>
	<p>Digite o nome do aluno:<input type="text" name="nome" required></p>
	<p><input type="date" name="nascimento" min="1950-01-01" max="<?= date("Y-m-d") ?>"></p>
	<p><input type="submit" name="botao" value="Classificar"></p>
</form>
<?php
if (isset($_POST['botao'])){
	$nome=$_POST['nome'];
	$nascimento=$_POST['nascimento'];
	$atual=date("Y-m-d");
	$atual=new DateTime($atual);
	$nascimento=new DateTime($nascimento);
	$diferenca=$atual->diff($nascimento);
	$idade=$diferenca->y;
	$nome=$_POST['nome'];
	if($idade<6){
		echo "<h2>Não trabalhamos com essa idade!</h2>";
	}
	if ($idade>=6&&$idade<=9) {
		echo "<h2>$nome tem $idade e é classificado como Baby Shark!</h2>";
		echo "<img src='img/babyshark.jpg' class='escola'";
	}else if($idade>=10&&$idade<=12){
		echo "<h2>$nome tem $idade e é classificado como Tilápia!</h2>";
		echo "<img src='img/tilapia.webp' class='escola'";
	}else if($idade>=13&&$idade<=15){
		echo "<h2>$nome tem $idade e é classificado como Bagre!</h2>";
		echo "<img src='img/bagre.webp' class='escola'";
	}else if($idade>=16&&$idade<=18){
		echo "<h2>$nome tem $idade e é classificado como Peixe Espada!</h2>";
		echo "<img src='img/peixeespada.jpg' class='escola'";
	}else if($idade>=18){
		echo "<h2>$nome tem $idade e é classificado como Tubarão!</h2>";
		echo "<img src='img/tubarao.webp' class='escola'";
	}}
?>
</body>
</html>