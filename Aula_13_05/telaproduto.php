<?php require_once 'cabecalho.php'; ?>
<form action="telaproduto.php" method="POST">
	<h1>Produtos</h1>
	<p>Nome Cliente:
		<input type="text" name="nome" size="40" maxlength="40"
		pattern="[a-zA-ZçÇãÃéÉ\s]{2,40}" required></p>
	<p>RG:
		<input type="text" name="rg" size="12" maxlength="12"
		pattern="[0-9]{1,2}.[0-9]{3}.[0-9]{3}-[0-9]{1}"
		placeholder="99.999.999-9" required></p>
	<p>Email:
		<input type="text" name="email" size="40" maxlength="74"
		pattern="[a-zA-Z0-9_.-]{1,60}@[a-z]{5,7}.[a-z]{2,3}"
		placeholder="usuario@email.com" required></p>
	<p>Produto:
		<input type="radio" name="tipo" value="Mouse" required>Mouse 20,00
		<input type="radio" name="tipo" value="Teclado" required>Teclado 95,60
		<input type="radio" name="tipo" value="Monitor" required>Monitor 223,30
		<input type="radio" name="tipo" value="Toner" required>Toner 313,50
	</p>
	<p>Quantidade:
		<input type="number" name="quantidade" min="1" max="10" required></p>
	<p><input type="submit" name="botao" value="Comprar"></p>
</form>
<?php
	if (isset($_POST['botao'])) {
		require_once 'model/Cliente.php';
		require_once 'model/Produto.php';

		$cliente=new Cliente();
		$produto=new Produto();

		$cliente->setNome($_POST['nome']);
		$cliente->setRg($_POST['rg']);
		$cliente->setEmail($_POST['email']);
		$produto->setQuantidade($_POST['quantidade']);

		echo "<h2>".$cliente->getNome()."</h2>";
		echo "<p class='resposta'>RG: ".$cliente->getRg()."</p>";
		echo "<p class='resposta'>Email: ".$cliente->getEmail()."</p>";
		echo "<p class='resposta'>Produto: ".$_POST['tipo']."</p>";
		echo "<p class='resposta'> R$: ".$produto->calculaPreco($_POST['tipo'])."</p>";
		echo "<p class='resposta'>Com ".$produto->getQuantidade()." unidades</p>";
		echo "<h2>Total R$ ".$produto->calculaTotal(
			$produto->calculaPreco($_POST['tipo']),
			$produto->getQuantidade())."</h2>";

	}

?>
</body>
</html>