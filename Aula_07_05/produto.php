<?php require_once'cabecalho.php'; ?>
<form action="produto.php" method="POST">
	<h1>Padaria Dulce Gusto</h1>
	<p>Selecione o prato:</p>
	<p><select name="prato" required>
		<option value="salgados">Salgados</option>
		<option value="refrigerante">Refrigerante</option>
		<option value="café">Café</option>
		<option value="bolos">Bolos</option>
	</select></p>
	<p>Digite a quantidade:
		<input type="number" name="quantidade" min="1" max="10" required></p>
	<p><input type="submit" name="botao" value="Comprar"></p>
</form>