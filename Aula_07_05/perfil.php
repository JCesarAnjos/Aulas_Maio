<?php
if(isset($_COOKIE['usuario'])){
	$nome=$_COOKIE['usuario'];
	$nascimento=$_COOKIE['nascimento'];
	$cortexto=$_COOKIE['cortexto'];
	$corfundo=$_COOKIE['corfundo'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perfil do <?= $nome?></title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body bgcolor="<?= $corfundo ?>">
	<h1 style="color: <? $cortexto ?>">
		Bem vindo, <?= $nome ?>! </h1>
	<p style="color: <?= $cortexto ?>">
		nascimento: <?= $nascimento ?></p>
		<form action="perfil.php" method="POST">
			<p><input type="submit" name="logoff" value="Logoff"></p>
		</form>
</body>
</html>
<?php
	if(isset($_POST['logoff'])){
		setcookie("usuario", "");
		setcookie("nascimento","");
		setcookie("corfundo", "");
		setcookie("cortexto", "");
		echo "<meta http-equiv='refresh' content='0;url=perfil.php'>";
	}
}else{
	
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perfil do <?= $nome?></title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<form action="perfil.php" method="POST">
	<h1> Cadastro </h1>
	<p>Seu nome:
		<input type="text" name="nome" size="40" maxlength="40" required></p>
	<p>Nascimento:
		<input type="date" name="nascimento" required></p>
	<p>Cor de fundo:
		<input type="color" name="corfundo" value="#FFFFFF" required></p>
	<p>Cor do Texto:
		<input type="color" name="cortexto" value="#000000" required></p>
	<p><input type="submit" name="botao" value="Cadastrar"></p>
</form>
<?php
	if(isset($_POST['botao'])){
	$nome=$_POST['nome'];
	$nascimento=$_POST['nascimento'];
	$cortexto=$_POST['cortexto'];
	$corfundo=$_POST['corfundo'];

	setcookie("usuario", $nome);
	setcookie("nascimento", $nascimento);
	setcookie("corfundo", $corfundo);
	setcookie("cortexto", $cortexto);
	echo "<h2> Cadastrado com sucesso!</h2>";
	echo "<p class='resposta'><a href='perfil.php'>Logar</a></p>";
	}
	echo "</body>";
	echo "</html>";
}
?>