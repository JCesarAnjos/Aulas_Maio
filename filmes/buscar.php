<?php
require_once 'cabecalho.php';

if(isset($_GET['busca'])){
	require_once 'persistence/FilmePA.php';
	$filmepa=new FilmePA();
	$consulta=$filmepa->buscar($_GET['busca']);
	if (!$consulta){
		echo "<h2>nenhum filme correspondente!<h2>";
	}else{
		require_once 'model/Filme.php';
		require_once 'persistence/Cat_filmesPA.php';
		require_once 'persistence/CategoriaPA.php';

		$cat_filmespa=new Cat_filmesPA();
		$categoriapa=new CategoriaPA();
		echo "<section>";

		while($linha=$consulta->fetch_assoc()){
			$filme=new Filme();
			$filme->setCod_fil($linha['cod_fil']);
			$filme->setTitulo($linha['titulo']);
			$filme->setTitulo($linha['titulo']);
			$filme->setCartaz($linha['cartaz']);
			$categorias=$cat_filmespa->listarCategorias($filme);
			echo "<div class='filme'>";
			echo "<h1>".$filme->getTitulo()."</h1>";
			echo "<p><img src='data:image/jpg;base64,".
			base64_encode($filme->getCartaz())."'></p>";
			while($line=$categorias->fetch_assoc()){
				$nomes=$categoriapa->converteCodigoNome($line['cod_cat']);
				$nome=$nomes->fetch_assoc();
				echo $nome['nome']." ";
			}
			echo "<p><a href='mais.php?codigo=".
			$filme->getCod_fil()."' class='mais'>Ver mais+</a></p>";
			echo "</div>";
		}
		echo "</section>";

	}

}
?>
</body>
</html>