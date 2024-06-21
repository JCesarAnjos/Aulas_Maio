<?php
require_once 'cabecalho.php';
require_once 'persistence/UsuarioPA.php';
require_once 'model/Usuario.php';
$usuario=new Usuario();
$usuariopa=new UsuarioPA();

$usuario->setUsuario($_COOKIE['usuario']);
$consulta=$usuariopa->listar($usuario->getUsuario());
if(!$consulta){
	echo "<h2>Usuário não encontrado! Tente novamente!</h2>";
}else{
	while($linha=$consulta->fetch_assoc()){
		$usuario->setCod_usu($linha['cod_usu']);
		$usuario->setNome($linha['nome']);
		$usuario->setSenha($linha['senha']);
		$usuario->setDatanasci($linha['datanasci']);
		$usuario->setDatanasci($linha['datanasci']);
	}
?>
<form action="alterarusuario.php" method="POST" class="formulario">
	<h1>Alterar Usuário</h1>
	<p>Usuário:
		<input type="text" name="usuario" pattern="[0-9a-zA-Z_@]{5,30}" size="30" maxlength="30" value="<?= $usuario->getUsuario()?>" required></p>
		<input type="hidden" name="cod_usu" value="<?= $usuario->getCod_usu()?>">
	<p>Nome:
		<input type="text" name="nome" 
		size="50" maxlength="50" 
		pattern="[a-zA-Z\sçÇãÃêÊôÔéÉ]{2,50}" value="<?= $usuario->getNome()?>" required></p>
	<p>Senha:
		<input type="password" name="senha"
		size="10" maxlength="10" 
		pattern="[0-9a-zA-Z_@]{5,10}" required></p>
	<p>Redigite a Senha:
		<input type="password" name="redigite"
		size="10" maxlength="10" 
		pattern="[0-9a-zA-Z_@]{5,10}" required></p>
	<p>Data nascimento:
		<input type="date" name="datanasci" value="<? $usuario->getDatanasci()?>" min="1950" max="<?=$usuario->menosCinco() ?>" required></p>
	<p><input type="submit" name="botao" value="Alterar"></p>
</form>
<?php
}

if (isset($_POST['botao'])) {
	$usuario->setCod_usu($_POST['cod_usu']);
	$usuario->setUsuario($_POST['usuario']);
	if ($_POST['senha']!=$_POST['redigite']) {
		echo "<h2>Senhas não conferem! Digite a senha corretamente!</h2>";
	}else{
		$usuario->setSenha(md5($_POST['senha']));
		$usuario->setNome($_POST['nome']);
		$usuario->setDatanasci($_POST['datanasci']);
		if ($usuariopa->alterar($usuario)) {
			echo "<h2>Usuário alterado com sucesso!</h2>";
		}else{
			echo "<h2>Erro na tentativa de alterar usuário!</h2>";
		}
	}
}
?>
</
</body>
</html>