<?php require_once'cabecalho.php'; ?>
<form action="imc.php" method="POST">
	<h1>IMC</h1>
	<p>Selecione o Sexo:</p>
	<select name="sexo" required>
		<option value="Feminino">Feminino</option>
		<option value="Masculino">Masculino</option>
	</select></p>
	<p>Digite a Altura:
		<input type="text" name="Altura" required></p>
	<input type="submit" name="botao" required>
</form>
<?php
if (isset($_POST['botao'])){
	$sexo=$_POST['sexo'];
	$altura=$_POST['Altura'];

if($sexo=="Feminino"){
	$pesoideal=(62.1*$altura)-44.7;
	echo "<h2>Imc = $pesoideal</h2>";
}if($sexo=="Masculino"){
	$pesoideal=(72.7*$altura)-58;
	echo "<h2>Imc = $pesoideal</h2>";
}
}
?>
</body>
</html>