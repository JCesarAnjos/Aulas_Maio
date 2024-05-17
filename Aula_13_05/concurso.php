<?php require_once 'cabecalho.php'?>;
<form action="concurso.php" method="POST">
	<h1>Concurso de Alturas</h1>
	<p>Quantos candidatos?
		<input type="number" name="quantidade" min="2" max="20" required></p>
	<p><input type="submit" name="botao" value="Enviar"></p>
</form>
<?php
	if(isset($_POST['botao'])){
		echo "<form action='concurso.php' method='POST'>";
		$quantidade=$_POST['quantidade'];
		for($contador=1;$contador<=$quantidade;$contador++){
			echo "<p> Nome do $contador&ordm;:<input type='text' name='nome$contador' size='40' maxlength='40' required></p>";
			echo "<p> Altura do $contador&ordm;: <input type='text' name='altura$contador' pattern='[0-9]{1},[0-9]{2}' size='4' required></p>"; 
		}
		echo "<input type='hidden' name='quantidade' value='$quantidade'>";
		echo "<p><input type='submit' name='botao2' value='Verificar'></p>";
		echo "</form>";
	}else if (isset($_POST['botao2'])){
		$quantidade=$_POST['quantidade'];
		$nomes=[];
		$alturas=[];
		$contador=0;
		while ($contador<$quantidade) { //captura o formulário
			$aux=$contador+1;
			$nomes[$contador]=$_POST["nome$aux"];
			$alturas[$contador]=$_POST["altura$aux"];
			$contador++;
		}
		//quem é o mais alto 
		$maisalto="";
		$alturaalta=0;
	
		for ($contador=0; $contador <$quantidade ; $contador++) { 
			if($alturas[$contador]>$alturaalta){
			$alturaalta=$alturas[$contador];
			$maisalto=$nomes[$contador];
		}
	}
	echo "<h2>O mais alto é o $maisalto com $alturaalta m</h2>";
}

?>;
</body>
</html>