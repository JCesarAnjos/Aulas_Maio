<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Primeira - 1&ordf;</title>
</head>
<body>
<?php
	//variáveis
	$numero=2+1;//inteiro -200, 7,16, -12
	$decimal=3.14; //flutuante 0.25 -1.33 3.33333
	$texto="Olá seja bem vindo"; //String -caractere
	$somar=$numero+$decimal;
	echo "<p>$texto O número $numero+$decimal=$somar</p>";
	$produto=$numero*$decimal;
	echo "<p>$numero x $decimal = $produto</p>";

	//$numero=$numero+1;
	$numero++;
	echo "<p>$numero</p>";
	//$numero=$numero-1;
	$numero--;

	$cubo=pow($numero, 3);
	echo "<p>$numero &sup3; = $cubo</p>";

	$raiz=sqrt(16);
	echo "<p>&radic;16 = $raiz</p>";




?>

</body>
</html>