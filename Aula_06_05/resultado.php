<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resultado</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<?php
		$numero=$_GET['numero'];
		$numero2=$_GET['numero2'];
		$soma=$numero+$numero2;

		echo "<h2> $numero + $numero2 = $soma</h2>";
		echo "<p class='resposta'>Outra soma?<a href='somar.php'>Voltar</a></p>";

	?>

</body>
</html>