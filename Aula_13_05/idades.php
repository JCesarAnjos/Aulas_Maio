<?php require_once 'cabecalho.php'?>;
<form action="idades.php" method="POST">
	<h1>Idade</h1>
	<p>Quantidade de Pessoas?
		<input type="number" name="quantidade" min="2" max="20" required></p>
	<p><input type="submit" name="botao" value="Enviar"></p>
</form>
<?php
	if(isset($_POST['botao'])){
		echo "<form action='idades.php' method='POST'>";
		$quantidade=$_POST['quantidade'];
		for($contador=1;$contador<=$quantidade;$contador++){
			echo "<p> Nome do $contador&ordm;:<input type='text' name='nome$contador' size='40' maxlength='40' required></p>";
			echo "<p> Idade do $contador&ordm;: <input type='number' name='idades$contador'  size='4' required></p>"; 
		}
		echo "<input type='hidden' name='quantidade' value='$quantidade'>";
		echo "<p><input type='submit' name='botao2' value='Verificar'></p>";
		echo "</form>";
	}else if (isset($_POST['botao2'])){
		$quantidade=$_POST['quantidade'];
		$nomes=[];
		$idades=[];
		$contador=0;
		while ($contador<$quantidade) { 
			$aux=$contador+1;
			$nomes[$contador]=$_POST["nome$aux"];
			$idades[$contador]=$_POST["idades$aux"];
			$contador++;
		}
		//quem é o mais velho
		$maisvelho="";
		$idademaior=0;

		for ($contador=0; $contador <$quantidade ; $contador++) { 
			if($idades[$contador]>$idademaior){
			$idademaior=$idades[$contador];
			$maisvelho=$nomes[$contador];
		}
	}
	echo "<h2>O mais velho é o $maisvelho com $idademaior anos</h2>";
}


?>;
</body>
</html>
