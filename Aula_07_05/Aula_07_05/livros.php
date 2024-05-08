<?php require_once 'cabecalho.php'; ?>
<form action="livros.php" method="POST">
	<h1>Cadastro de Livros</h1>
	<p>Autor do 1&ordm;:<input type="text" name="autor1" size="40" maxlength="70" required></p>
	<p>Título do 1&ordm;:<input type="text" name="titulo1" size="70" maxlength="70"required></p>
	<p>Número de Páginas:<input type="number" name="pagina1" min="1" max="9999" required></p>
	<hr/>
	<p>Autor do 2&ordm;:<input type="text" name="autor2" size="40" maxlength="70" required></p>
	<p>Título do 2&ordm;:<input type="text" name="titulo2" size="70" maxlength="70"required></p>
	<p>Número de Páginas:<input type="number" name="pagina2" min="1" max="9999" required></p>
	<input type="submit" name="botao" value="Enviar"></p>
</form>
<?php
	if(isset($_POST['botao'])){
		$autor1=$_POST['autor1'];
		$titulo1=$_POST['titulo1'];
		$pagina1=$_POST['pagina1'];
		$autor2=$_POST['autor2'];
		$titulo2=$_POST['titulo2'];
		$pagina2=$_POST['pagina2'];

		if ($pagina1>$pagina2) {
			echo "<h2>O livro $titulo1 é maior!</h2>";
			echo "<p class='resposta'>Autor: $autor1<br/> com $pagina1 páginas</p>";
		}else if ($pagina2>$pagina1) {
			echo "<h2>O livro $titulo2 é maior!</h2>";
			echo "<p class='resposta'>Autor: $autor2<br/> com $pagina2 páginas</p>";
		}else{
			echo "<h2>Os livros têm o mesmo tamanho!</h2>";
		}
}

?>
</body>
</html>

	