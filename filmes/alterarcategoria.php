<?php 
require_once 'cabecalho.php';
require_once 'model/Categoria.php';
require_once 'persistence/CategoriaPA.php';

$categoriapa=new CategoriaPA();
$consulta=$categoriapa->listar();
if(!$consulta){
	echo "<h2>Não há categorias cadastradas!</h2>";
}else{
?>
<form action="alterarcategoria.php" method="POST" class="formulario">
	<h1>Alterar Categoria</h1>
	<p>A categoria:
		<select name="nome">
<?php
		while($linha=$consulta->fetch_assoc()){
			echo "<option value='".$linha['cod_cat'].
			"'>".$linha['nome']."</option>";
		}
?>			
		</select></p>
	<p>Para: 
		<input type="text" name="para"
		size="20" maxlength="20"
		pattern="[0-9a-zA-ZçÇãÃ-\síÍéÉóÓáÁâÂ]{4,20}"
		required></p>
	<p><input type="submit" name="botao" value="Alterar"></p>	
</form>
<?php	
}

if (isset($_POST['botao'])) {
	require_once 'model/Categoria.php';
	$categoria=new Categoria();

	$categoria->setCod_cat($_POST['nome']);
	$categoria->setNome($_POST['para']);

	if($categoriapa->verificaNome($categoria->getNome())){
		echo "<h2>Categoria informada já existe!</h2>";
	}else{
		if($categoriapa->alterar($categoria)){
			echo "<h2>Categoria alterada com sucesso!</h2>";
			echo "<meta http-equiv='refresh' content='1;alterarcategoria.php'>";
		}else{
			echo "<h2>Falha ao tentar alterar! Tente novamente!</h2>";
		}
	}
}
?>
</body>
</html>