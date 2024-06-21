<?php
require_once 'cabecalho.php';

if (isset($_GET['pagina'])) {
	$pagina=$_GET['pagina'];
}else{
	$pagina=1;
}

$limite=5;

require_once 'model/Filme.php';
require_once 'persistence/FilmePA.php';
$filmepa=new FilmePA();
$offset=($pagina-1)*$limite;
$consulta=$filmepa->listar($limite,$offset);
if(!$consulta){
	echo "<h2>Cadastre filmes primeiro!</h2>";
}else{
	echo "<h2>Filmes</h2>";
	echo "<section>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Código</th>";
	echo "<th>Título</th>";
	echo "<th>Diretor</th>";
	echo "<th>Roteirista</th>";
	echo "<th>Atores</th>";
	echo "<th>Cartaz</th>";
	echo "<th>Trailer</th>";
	echo "<th>Categorias</th>";
	echo "<th>Administrador</th>";
	echo "</tr>";

	require_once 'model/Cat_filmes.php';
	require_once 'persistence/Cat_filmesPA.php';
	$cat_filmespa=new Cat_filmesPA();
	require_once 'persistence/CategoriaPA.php';
	$categoriapa=new CategoriaPA();
	while($linha=$consulta->fetch_assoc()){
		$filme=new Filme();
		$filme->setCod_fil($linha['cod_fil']);
		$filme->setTitulo($linha['titulo']);
		$filme->setDiretor($linha['diretor']);
		$filme->setRoteirista($linha['roteirista']);
		$filme->setAtores($linha['atores']);
		$filme->setCartaz($linha['cartaz']);
		$filme->setTrailer($linha['trailer']);
		$filme->setAdministrador($linha['administrador']);
		$categorias=$cat_filmespa->listar($filme);

		echo "<tr>";
		echo "<td>".$filme->getCod_fil()."</td>";
		echo "<td>".$filme->getTitulo()."</td>";
		echo "<td>".$filme->getDiretor()."</td>";
		echo "<td>".$filme->getRoteirista()."</td>";
		echo "<td>".$filme->getAtores()."</td>";
		echo "<td><img src='data:image/jpg;base64,".
		base64_encode($filme->getCartaz())."'></td>";
		echo "<td>".$filme->getTrailer()."</td>";
		if(!$categorias){
			echo "<td>&nbsp;</td>";
		}else{
			$cat_filmes=new Cat_filmes();
			echo "<td>";
			while($line=$categorias->fetch_assoc()){
				$cat_filmes->setCod_cat($line['cod_cat']);
				$nomes=$categoriapa->converteCodigoNome($cat_filmes->getCod_cat());
				$nome=$nomes->fetch_assoc();
				echo $nome['nome']." ";
			}
			echo "</td>";
		}
		echo "<td>".$filme->getAdministrador()."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</section>";

	echo "<section class='paginas'>";
	if($pagina>1){
		$anterior=$pagina-1;
		echo "<a href='listarfilme.php?pagina=$anterior'>
		&lt;&lt;</a>";
	}
	echo $pagina;
	$busca=$filmepa->contar();
	$busca=$busca->fetch_assoc();
	$total=$busca['linhas'];
	$total=ceil($total/$limite);
	if($pagina<$total){
		$proxima=$pagina+1;
		echo "<a href='listarfilme.php?pagina=$proxima'>
		&gt;&gt;</a>";
	}
	echo "</section>";

}
?>
</body>
</html>
