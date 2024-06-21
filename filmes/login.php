<?php require_once 'cabecalho.php'; ?>
<form action="login.php" method="POST" class="formulario">
	<h1>Login</h1>
	<p>Usuário:
		<input type="text" name="usuario"
		size="30" maxlength="30"
		pattern="[0-9a-zA-Z_@]{5,30}" required></p>
	<p>Senha:
		<input type="password" name="senha"
		size="10" maxlength="10" 
		pattern="[0-9a-zA-Z_@]{5,10}" required></p>
	<p><input type="submit" name="botao" value="Logar"></p>
</form>
<?php
	if (isset($_POST['botao'])) {
		require_once 'model/Administrador.php';
		require_once 'persistence/AdministradorPA.php';
		$administrador=new Administrador();
		$administradorpa=new AdministradorPA();

		$administrador->setUsuario($_POST['usuario']);
		$administrador->setSenha(md5($_POST['senha']));

		if($administradorpa->logar(
			$administrador->getUsuario(),$administrador->getSenha())){
			$administrador->logar($administrador->getUsuario());
			//header("Location:index.php");
			echo "<script>window.top.location.href = '/filmes';</script>";
		}else{
			//usuario?
			require_once 'model/Usuario.php';
			require_once 'persistence/UsuarioPA.php';

			$usuario=new Usuario();
			$usuariopa=new UsuarioPA();
			$usuario->setUsuario($_POST['usuario']);
			$usuario->setSenha(md5($_POST['senha']));
			if($usuariopa->logar($usuario->getUsuario(),$usuario->getSenha())){
				$usuario->logar($usuario->getUsuario());
				echo "<script>window.top.location.href='/filmes';</script>";
			}else{
				echo "<h2>Login incorreto!</h2>";
			}
		}
	}
?>
</body>
</html>