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
<form action="excluircategoria.php" method="POST" class="formulario">
	<h1>Excluir Categoria</h1>
	<p>A categoria:
		<select name="nome">
<?php
		while($linha=$consulta->fetch_assoc()){
			echo "<option value='".$linha['cod_cat'].
			"'>".$linha['nome']."</option>";
		}
?>			
		</select></p>
	<p><input type="submit" name="botao" value="Excluir"></p>	
</form>
<?php	
}

if (isset($_POST['botao'])) {
	require_once 'model/Categoria.php';
	$categoria=new Categoria();

	$categoria->setCod_cat($_POST['nome']);
	

	if($categoriapa->excluir($categoria)){
		echo "<h2>Categoria excluida com sucesso!</h2>";
		echo "<meta http-equiv='refresh' content='1;excluircategoria.php'>";
	}else{
		echo "<h2>Falha ao tentar excluir! Tente novamente!</h2>";
	}
}
?>
</body>
</html>