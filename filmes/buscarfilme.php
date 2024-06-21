<?php require_once 'cabecalho.php';?>
<form action="buscarfilme.php" method="GET" class="formulario">
	<h1>Buscar</h1>
	<p>Digite o titulo do filme:</p>
	<p><input type="text" name="busca" size="50" 
		pattern="[0-9a-zA-ZçÇãÃáÁéÉêÊ\s-_óÓ:]{1,90}" required></p>
	<p><input type="submit" name="botao" value="Buscar"></p>
</form>
<?php
	if (isset($_GET['botao'])) {
		require_once 'model/Filme.php';
		require_once 'persistence/FilmePA.php';
		require_once 'persistence/Cat_filmesPA.php';
		$filmepa=new FilmePA();
		$cat_filmespa=new Cat_filmesPA();
		$consulta=$filmepa->buscar($_GET['busca']);
		if (!$consulta) {
			echo "<h2>Nenhum filme correspondente!</h2>";
		}else{
			echo "<section>";
			while($linha=$consulta->fetch_assoc()){
				$filme=new Filme();
				$filme->setCod_fil($linha['cod_fil']);
				$filme->setTitulo($linha['titulo']);
				$filme->setDiretor($linha['diretor']);
				$filme->setRoteirista($linha['roteirista']);
				$filme->setAtores($linha['atores']);
				$filme->setCartaz($linha['cartaz']);
				$filme->setTrailer($linha['trailer']);
				$categorias=$cat_filmespa->listar($filme);

				echo "<div class='filme'>";
				echo "<h1>".$filme->getTitulo()."</h1>";
				echo "<p>Código: ".$filme->getCod_fil()."</p>";
				echo "<p>Diretor: ".$filme->getDiretor()."</p>";
				echo "<p>Roteirista: ".$filme->getRoteirista()."</p>";
				echo "<p>Atores: ".$filme->getAtores()."</p>";
				echo "<p><img src='data:image/jpg;base64,".
				base64_encode($filme->getCartaz())."'></p>";
				echo "<p><iframe class='trailer' src='".
				$filme->getTrailer()."'></iframe></p>";
				require_once 'persistence/CategoriaPA.php';
				$categoriapa=new CategoriaPA();
				while($line=$categorias->fetch_assoc()){
					$nomes=$categoriapa->converteCodigoNome($line['cod_cat']);
					$nome=$nomes->fetch_assoc();
					echo $nome['nome']." ";
				}
?>
	<form class="alterar" action="alterarfilme.php" method="POST">
		<input type="hidden" name="alterar" value="<?= $filme->getCod_fil()?>">
		<p><input type="submit" name="botao2" value="Alterar"></p>
	</form>
	<form class="alterar" action="excluirfilme.php" method="POST">
		<input type="hidden" name="excluir" value="<?= $filme->getCod_fil()?>">
		<p><input type="submit" name="botao2" value="Excluir"></p>
	</form>
<?php
				echo "</div>";

			}
			echo "</section>";
		}
	}

?>
</body>
</html>