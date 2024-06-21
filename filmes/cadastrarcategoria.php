<?php require_once 'cabecalho.php'; ?>
<form action="cadastrarcategoria.php" method="POST" class="formulario">
	<h1>Cadastro de Categorias</h1>
	<p>Nome:
		<input type="text" name="nome"
		size="20" maxlength="20"
		pattern="[0-9a-zA-ZçÇãÃ-\síÍéÉóÓáÁâÂ]{4,20}"
		required></p>
	<p><input type="submit" name="botao" value="Cadastrar"></p>
</form>
<?php

	if (isset($_POST['botao'])) {
		require_once 'model/Categoria.php';
		require_once 'persistence/CategoriaPA.php';
		require_once 'persistence/AdministradorPA.php';

		$categoria=new Categoria();
		$categoriapa=new CategoriaPA();
		$administradorpa=new AdministradorPA();
		$categoria->setNome($_POST['nome']);
		if($categoriapa->verificaNome($categoria->getNome())){
			echo "<h2>Categoria já cadastrada!</h2>";
		}else{

		$consulta=$categoriapa->retornaUltimo();
		if(!$consulta){
			$codigo=1;
		}else{
			$linha=$consulta->fetch_assoc();
			$codigo=$linha['ultimo'];
			$codigo++;
		}
		$categoria->setCod_cat($codigo);
		$consulta=$administradorpa->retornaCodigo($_COOKIE['administrador']);
		$linha=$consulta->fetch_assoc();
		$categoria->setAdministrador($linha['cod_adm']);
		if($categoriapa->cadastrar($categoria)){
			echo "<h2>Categoria cadastrada com sucesso!</h2>";
		}else{
			echo "<h2>Erro na tentativa de cadastrar!Tente novamente!</h2>";
		}
	}

	}

?>
</body>
</html>