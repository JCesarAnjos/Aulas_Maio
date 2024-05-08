<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Salário</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<form action="resalario.php" method="POST">
		<h1>Cálculo do Salário</h1>
		<p>Digite o nome:<input type="text" name="nome" size="50" maxlength="100" required></p>
		<p>Horas trabalhadas:<input type="number" name="horas" min="1" max="60"required></p>
		<p>Valor da Hora R$:<input type="text" name="valor" size="6" maxlength="10" pattern="[0-9]{1,4},[0-9]{2}" placeholder="99,99" title="Favor digitar na forma 99,99" required>
		<p><input type="submit" name="botao" value="Calcular"></p>


		
	</form>

</body>
</html>