<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resultado Salário</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<?php
	$nome=$_POST['nome'];
	$horas=$_POST['horas'];
	$valor=$_POST['valor'];

	$salariobruto=$horas*$valor;
	$salarioliquido=$salariobruto-(0.10*$salariobruto);

	echo "<h2>Funcionario $nome</h2>";
	echo "<p>Seu salário bruto é de R$ ".number_format($salariobruto,2, ",",".")."</p>";
	echo "<p>Seu salário líquido é de R$ ".number_format($salarioliquido,2,",",".")."</p>";
	echo "<p>Deseja ver outro funcionário? <a href='salario.php'>Sim</a></p>"; 

?>

</body>
</html>