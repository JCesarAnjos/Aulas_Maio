<?php require_once 'cabecalho.php'; ?>
<section class="topo">
	<div id="logo">
		<a href="//localhost/filmes"><img src="img/rolo.png"></a>
	</div>
	<div id="menu">
<?php
	if (isset($_COOKIE['administrador'])) {
?>
	<ul class="nav">
		<li><a href="menucategoria.php" target="janela">Categoria</a></li>
		<li><a href="menufilme.php" target="janela">Filme</a></li>
		<li><a href="logoff.php">Sair</a></li>
	</ul>
<?php
	}else if (isset($_COOKIE['usuario'])) {
?>
	<ul class="nav">
		<li><a href="alterarusuario.php" target="janela">Alterar</a></li>
		<li><a href="historicousuario.php" target="janela">Histórico</a></li>
		<li><a href="logoff.php">Sair</a></li>
	</ul>
<?php
	}else{
?>
	<ul class="nav">
		<li><a href="cadastrarusuario.php" target="janela">Cadastrar</a></li>
		<li><a href="login.php" target="janela">Logar</a></li>
	</ul>
<?php
	}
?>
	</div>
	<div id="busca">
		<form action="buscar.php" method="GET" target="janela">
			<p><input type="search" name="busca" size="30">
				<input type="submit" name="botao" value="Buscar"></p>
		</form>
	</div>
</section>
<section class="conteudo">
	<iframe src="home.php" name="janela" class="jan"></iframe>
</section>
<section class="rodape">
	<p><span class="material-symbols-outlined">
phone_in_talk
</span>(42) 3232-4444</p>
	<p><span class="material-symbols-outlined">
mail
</span>administrador@email.com</p>
</section>
</body>
</html>