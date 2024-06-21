<?php
require_once 'cabecalho.php';

if(isset($_POST['alterar'])){
	require_once 'model/Filme.php';
	require_once 'persistence/FilmePA.php';
	require_once 'model/Cat_filmes.php';
	require_once 'persistence/Cat_filmesPA.php';
	require_once 'persistence/CategoriaPA.php';

	$filmepa=new FilmePA();
	$filme=new Filme();
	$cat_filmespa=new Cat_filmesPA();
	$categoriapa=new CategoriaPA();

	$consulta=$filmepa->buscarPorCodigo($_POST['alterar']);
	if (!$consulta) {
		echo "<h2>Filme não encontrado! Busque novamente!</h2>";
	}else{
		while($linha=$consulta->fetch_assoc()){
			$filme->setCod_fil($linha['cod_fil']);
			$filme->setTitulo($linha['titulo']);
			$filme->setDiretor($linha['diretor']);
			$filme->setRoteirista($linha['roteirista']);
			$filme->setAtores($linha['atores']);
			$filme->setCartaz($linha['cartaz']);
			$filme->setTrailer($linha['trailer']);
			$categorias=$cat_filmespa->listarCategorias($filme);
		}
?>
<form action="alterarfilme.php" method="POST" enctype="multipart/form-data" class="formulario">
	<h1>Alterar filme</h1>
	<input type="hidden" name="cod_fil" 
	value="<?= $filme->getCod_fil()?>">
	<p>Título:
		<input type="text" name="titulo" size="50" 
		maxlength="90" pattern="[0-9a-zA-ZçÇãÃáÁéÉêÊ\s-_óÓ:]{1,90}"
		value="<?= $filme->getTitulo()?>" required></p>
	<p>Diretor:
		<input type="text" name="diretor" size="50" maxlength="50"
		pattern="[a-zA-Z\sçÇãÃêÊôÔéÉ]{2,50}"
		value="<?= $filme->getDiretor()?>" required></p>
	<p>Roteirista:
		<input type="text" name="roteirista" size="50" maxlength="50"
		pattern="[a-zA-Z\sçÇãÃêÊôÔéÉ]{2,50}"
		value="<?= $filme->getRoteirista()?>" required></p>
	<p>Atores:
		<textarea name="atores" rows="3" cols="40" 
		pattern="[a-zA-Z\sçÇãÃêÊôÔéÉ,.:]{2,300}" required><?= $filme->getAtores()?></textarea></p>
	<p>Cartaz:
		<img src="data:image/jpg;base64,
		<?=base64_encode($filme->getCartaz())?>"><br/>
		<input type="file" name="cartaz"></p>
	<p>Link do trailer:
		<input type="text" name="trailer" size="50" maxlength="100" 
		pattern="[a-zA-Z0-9/?:=-.]{10,100}" 
		placeholder="link de incorporação" 
		value="<?= $filme->getTrailer()?>" required></p>
	<section>
<?php
	$requisicao=$categoriapa->listar();
	$row=[];
	$i=0;
	while($linha=$categorias->fetch_assoc()){
		$row[$i]=$linha['cod_cat'];
		$i++;
	}
	while($linha=$requisicao->fetch_assoc()){
		if(in_array($linha['cod_cat'],$row)){
			echo "<input type='checkbox' name='".
				$linha['cod_cat']."' value='".
				$linha['cod_cat']."' checked>".
				$linha['nome']."&nbsp;";
		}else{
			echo "<input type='checkbox' name='".
				$linha['cod_cat']."' value='".
				$linha['cod_cat']."'>".
				$linha['nome']."&nbsp;";
		}
	}
	echo "</section>";

?>
	<p><input type="submit" name="botao" value="Alterar"></p>	
</form>
<?php
	}

}else if(isset($_POST['botao'])){
	require_once 'model/Filme.php';
	require_once 'persistence/FilmePA.php';
	require_once 'model/Cat_filmes.php';
	require_once 'persistence/Cat_filmesPA.php';
	require_once 'persistence/CategoriaPA.php';

	$filmepa=new FilmePA();
	$filme=new Filme();
	$cat_filmespa=new Cat_filmesPA();
	$categoriapa=new CategoriaPA();

	$filme->setCod_fil($_POST['cod_fil']);
	$filme->setTitulo($_POST['titulo']);
	$filme->setDiretor($_POST['diretor']);
	$filme->setRoteirista($_POST['roteirista']);
	$filme->setAtores($_POST['atores']);
	if($_FILES['cartaz']['tmp_name']!=""){
		if(!$filme->verificaTamanho($_FILES['cartaz']['tmp_name'])){
			echo "<h2>A imagem enviada é muito grande! Máximo 65Kb!</h2>";
		}else{
			$filme->setCartaz(addslashes(
				file_get_contents($_FILES['cartaz']['tmp_name'])));
		}
	}else{
		$consulta=$filmepa->buscarPorCodigo($filme->getCod_fil());
		$linha=$consulta->fetch_assoc();
		$filme->setCartaz(addslashes($linha['cartaz']));
	}
	$filme->setTrailer($_POST['trailer']);
	$categorias=$categoriapa->listar();
	$consulta=$cat_filmespa->listarCategorias($filme);
	$row=[];
	$i=0;
	while($line=$consulta->fetch_assoc()){
		$row[$i]=$line['cod_cat'];
		$i++;
	}
	while($linha=$categorias->fetch_assoc()){
		$cod_cat=$linha['cod_cat'];
		if (isset($_POST["$cod_cat"])) {
			$cat_filmes=new Cat_filmes();
			$cat_filmes->setCod_fil($filme->getCod_fil());
			$cat_filmes->setCod_cat($cod_cat);
			if(!in_array($cat_filmes->getCod_cat(),$row)){
				$requisicao=$cat_filmespa->retornaUltimo();
				if (!$requisicao) {
					$codigo=1;
				}else{
					$line=$requisicao->fetch_assoc();
					$codigo=$line['ultimo'];
					$codigo++;
				}
				$cat_filmes->setCod_cat_fil($codigo);
				if(!$cat_filmespa->cadastrar($cat_filmes)){
					echo "<h2>Falha ao cadastrar categoria!</h2>";
				}
			}
		}else{
			if (in_array($cod_cat,$row)) {
				$requisicao=$cat_filmespa->retornaCodigo(
					$filme->getCod_fil(),$cod_cat);
				if(!$requisicao){
					echo "<h2>Arrume a sql do retornaCodigo()!</h2>";
				}else{
					$line=$requisicao->fetch_assoc();
					$cod_cat_fil=$line['cod_cat_fill'];
					if (!$cat_filmespa->excluir($cod_cat_fil)) {
						echo "<h2>Erro na tentativa de excluir categoria!</h2>";
					}
				}
			}
		}
	}
	if($filmepa->alterar($filme)){
		echo "<h2>Filme alterado com sucesso!</h2>";
	}else{
		echo "<h2>Erro na tentativa de alterar o filme!</h2>";
	}
}
?>
</body>
</html>
