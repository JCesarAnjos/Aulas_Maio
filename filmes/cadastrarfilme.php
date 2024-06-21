<?php
require_once 'cabecalho.php';
require_once 'persistence/CategoriaPA.php';

$categoriapa=new CategoriaPA();
$consulta=$categoriapa->listar();
if (!$consulta) {
	echo "<h2>Favor cadastrar categorias primeiro!</h2>";
}else{
?>
<form class="formulario" action="cadastrarfilme.php" method="POST" 
enctype="multipart/form-data">
	<h1>Cadastro de filme</h1>
	<p>Título:
		<input type="text" name="titulo" size="50" 
		maxlength="90" pattern="[0-9a-zA-ZçÇãÃáÁéÉêÊ\s-_óÓ:]{1,90}"
		required></p>
	<p>Diretor:
		<input type="text" name="diretor" size="50" maxlength="50"
		pattern="[a-zA-Z\sçÇãÃêÊôÔéÉ]{2,50}" required></p>
	<p>Roteirista:
		<input type="text" name="roteirista" size="50" maxlength="50"
		pattern="[a-zA-Z\sçÇãÃêÊôÔéÉ]{2,50}" required></p>
	<p>Atores:
		<textarea name="atores" rows="3" cols="40" 
		pattern="[a-zA-Z\sçÇãÃêÊôÔéÉ,.:]{2,300}" required></textarea></p>
	<p>Cartaz:
		<input type="file" name="cartaz" required></p>
	<p>Link do trailer:
		<input type="text" name="trailer" size="50" maxlength="100" 
		pattern="[a-zA-Z0-9/?:=-.]{10,100}" 
		placeholder="link de incorporação"  required></p>
	<section>
<?php
	while($linha=$consulta->fetch_assoc()){
		echo "<input type='checkbox' name='".$linha['nome'].
		"' value='".$linha['cod_cat']."'>".$linha['nome'].
		"&nbsp;&nbsp;";
	}
?>
	</section>
<p><input type="submit" name="botao" value="Cadastrar"></p>
</form>
<?php
}

if (isset($_POST['botao'])) {
	require_once 'model/Filme.php';
	require_once 'persistence/FilmePA.php';
	require_once 'model/Cat_filmes.php';
	require_once 'persistence/Cat_filmesPA.php';
	require_once 'persistence/AdministradorPA.php';

	$filme=new Filme();
	$filmepa=new FilmePA();

	$filme->setTitulo($_POST['titulo']);
	if($filmepa->verificaTitulo($filme)){
		echo "<h2>O filme digitado já está cadastrado!</h2>";
	}else{

		if(!$filme->verificaTamanho($_FILES['cartaz']['tmp_name'])){
			echo "<h2>Imagem muito grande! Máximo 65Kb!</h2>";
		}else{
			$filme->setCartaz(addslashes(
				file_get_contents($_FILES['cartaz']['tmp_name'])));
			$filme->setDiretor($_POST['diretor']);
			$filme->setRoteirista($_POST['roteirista']);
			$filme->setAtores($_POST['atores']);
			$filme->setTrailer($_POST['trailer']);
			$requisicao=$filmepa->retornaUltimo();
			if (!$requisicao) {
				$codigo=1;
			}else{
				$linha=$requisicao->fetch_assoc();
				$codigo=$linha['ultimo'];
				$codigo++;
			}
			$filme->setCod_fil($codigo);
			$administradorpa=new AdministradorPA();
			$requisicao=$administradorpa->
			retornaCodigo($_COOKIE['administrador']);
			$linha=$requisicao->fetch_assoc();
			$filme->setAdministrador($linha['cod_adm']);
			$cat_filmespa=new Cat_filmesPA();
			$consulta=$categoriapa->listar();
			while($linha=$consulta->fetch_assoc()){
				$nome=$linha['nome'];
				if(isset($_POST["$nome"])){

					$cat_filmes=new Cat_filmes();
					$cat_filmes->setCod_cat($_POST["$nome"]);
					$cat_filmes->setCod_fil($filme->getCod_fil());
					$dados=$cat_filmespa->retornaUltimo();
					if (!$dados) {
						$cod=1;
					}else{
						$linha=$dados->fetch_assoc();
						$cod=$linha['ultimo'];
						$cod++;
					}
					$cat_filmes->setCod_cat_fil($cod);
					if (!$cat_filmespa->cadastrar($cat_filmes)) {
						echo "<h2>Erro ao cadastrar categorias do filme!</h2>";
					}

				}

			}
			if ($filmepa->cadastrar($filme)) {
				echo "<h2>Filme cadastrado com sucesso!</h2>";
			}else{
				echo "<h2>Erro na tentativa de cadastrar filme! 
				Tente novamente!</h2>";
			}

		}
			
	}
}

?>
</body>
</html>