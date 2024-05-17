<?php require_once 'cabecalho.php'; ?>
<form action="telahospedagem.php" method="POST">
	<h1>Hospedagem</h1>
	<p>Nome do Hóspede:
		<input type="text" name="nome" size="40" maxlength="40" required></p>
	<p> Cpf do Hóspede:
		<input type="text" name="cpf" size="14" maxlength="14" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" placeholder="999.999.999-99" required></p>
	<p> Telefone:
		<input type="text" name="Telefone" size="14" maxlength="14" pattern="\([0-9]\)[0-9]{4,5}-[0-{4}" placeholder="(42)99999-9999" required></p>
	<p>N&ordm; do quarto:
		<input type="number" name="quarto" min="1" max="30" required></p>
	<p>Data Chegada:
		<input type="date" name="datachegada" max="<?= date('Y-m-d')?>" required></p>
	<p>Hora Chegada:
		<input type="time" name="horachegada" max="24:00:00" required></p>
	<p><input type="submit" name="botao" value="Calcular"></p>
</form>
<?php
	if(isset($_POST['botao'])){
		require_once 'model/Hospede.php';
		require_once 'model/Hospedagem.php';
		//instânciar um objeto
		$hospede= new Hospede();
		$hospede->setNome($_POST['nome']);
		$hospede->setCpf($_POST['cpf']);
		$hospede->setTelefone($_POST['Telefone']);
		$hospedagem= new Hospedagem();
		$hospedagem->setQuarto($_POST['quarto']);
		$hospedagem->setDiaChegada($_POST['datachegada']);
		$hospedagem->setHoraChegada($_POST['horachegada']);

		echo "<h2>Caro ".$hospede->getNome()."</h2>";
		echo "<p class='resposta'>CPF ".$hospede->getCpf()."</p>";
		echo "<p class='resposta'>Telefone ".$hospede->getTelefone()."</p>";
		echo "<h2>Total R$ ".
		$hospedagem->calcularTotal($hospedagem->getValorh($hospedagem->getQuarto()),$hospedagem->getDiaChegada(),$hospedagem->getHoraChegada())."</h2>";
	}





?>
</body>
</html>