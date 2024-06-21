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
	<form action="familia.php" method="POST">
	<h1> Cadastro de Adotantes </h1>
	<p> Nome:<input type= "text" name="nome" size="40" maxlenght="40" required></p>
	<p>Interessado em adotar: <select name= "tipo" required>
		<option value="gato">Gato</option>
		<option value="cachorro">Cachorro</option>
		<option value="cavalo">Cavalo</option>
		<option value="duvida">Ainda não decidi</option>
	</select></p>
	<p> Idade (aproximada):<input type= "text" name="idade" size="40" maxlenght="40" required></p>
		<p>Preferência por sexo: <select name= "sexo" required>
		<option value="macho">Macho</option>
		<option value="fêmea">Fêmea</option>
		<option value="n/a">Não se aplica</option>
	</select></p>
	<p> Preferência por Porte: <select name= "porte" required>
		<option value="p">P</option>
		<option value="m">M</option>
		<option value="g">G</option>
		<option value="n/a">Não se aplica</option>
	</select></p>
	<p><input type="submit" name="botao" value="Finalizar Cadastro"></p>
</form>
<?php
if(isset($_POST['botao'])){
	$nome=$_POST['nome'];
	echo "<h2> $nome você foi cadastrado com sucesso na nossa base de adotantes, em breve entraremos em contato! Obrigade! </h2>";
	
}
echo"</body>";
echo"</html>";

?>
