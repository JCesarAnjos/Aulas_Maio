<?php
require_once 'cabecalho.php';
require_once 'persistence/CategoriaPA.php';
require_once 'model/Categoria.php';
$categoriapa=new CategoriaPA();
$consulta=$categoriapa->listar();
if(!$consulta){
	echo "<h2>Não há categorias cadastradas!</h2>";
}else{
	
	echo "<h2>Categorias</h2>";
	echo "<section>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Código</th>";
	echo "<th>Nome</th>";
	echo "<th>Administrador</th>";
	echo "</tr>";

	$categoria=new Categoria();
	require_once 'persistence/AdministradorPA.php';
	$administradorpa=new AdministradorPA();

	while($linha=$consulta->fetch_assoc()){
		$categoria->setCod_cat($linha['cod_cat']);
		$categoria->setNome($linha['nome']);
		$categoria->setAdministrador($linha['administrador']);
		$requerimento=$administradorpa->converteCodigoNome($categoria->getAdministrador());
		if(!$requerimento){
			echo "<h2>Verifique se o código=nome nas tabelas!</h2>";
		}else{
			$linha=$requerimento->fetch_assoc();
			$categoria->setAdministrador($linha['usuario']);
		}
		echo "<tr>";
		echo "<td>".$categoria->getCod_cat()."</td>";
		echo "<td>".$categoria->getNome()."</td>";
		echo "<td>".$categoria->getAdministrador()."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</section>";
}

?>
</body>
</html>
