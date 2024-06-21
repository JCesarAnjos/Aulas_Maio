
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perfil do <?= $nome ?> </title>
	<link rel="stylesheet" href="css/estilo.css">
</head>

</html>

<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastrar Pet</title>
	<link rel="stylesheet" href="css/estilo.css">
	<form action= "adicionarpet.php" method="POST">
	<h1> Cadastrar pet </h1>
	<p> Nome do animal:<input type= "text" name="nome" size="40" maxlenght="40" required></p>
	<p>Tipo: <select name= "tipo" required>
		<option value="gato">Gato</option>
		<option value="cachorro">Cachorro</option>
		<option value="cavalo">Cavalo</option>
	</select></p>
	<p> Idade (aproximada):<input type= "text" name="idade" size="40" maxlenght="40" required></p>
		<p>Sexo: <select name= "sexo" required>
		<option value="macho">Macho</option>
		<option value="fêmea">Fêmea</option>
	</select></p>
	<p> Porte: <select name= "porte" required>
		<option value="p">P</option>
		<option value="m">M</option>
		<option value="g">G</option>
		<option value="n/a">Não se aplica</option>
	</select></p>
	<p> Cor da pelagem:
	<input type= "text" name="cordapelagem" size="40" maxlenght="40" required></p>
	<p><input type="submit" name="botao" value="Cadastrar pet"></p>
</form>
<?php
if(isset($_POST['botao'])){
	$nome=$_POST['nome'];
	$sexo=$_POST['sexo'];
	$porte=$_POST['porte'];
	$cordapelagem=$_POST['cordapelagem'];
	$idade=$_POST['idade'];

	echo "<h2>O pet $nome foi cadastrado com sucesso!Confirmar as informações abaixo: </h2>";
	echo "<h2>$sexo</h2>";
	echo "<h2>$porte</h2>";
	echo "<h2>$cordapelagem</h2>";
	echo "<h2>$idade</h2>";
}
echo"</body>";
echo"</html>";

?>
