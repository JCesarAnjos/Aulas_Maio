<?php require_once 'cabecalho.php'; 
require_once 'model/Usuario.php';
$usuario=new Usuario();
?>
<form action="cadastrarusuario.php" method="POST" class="formulario">
	<h1>Cadastro de Usuário</h1>
	<p>Usuário/Login:
		<input type="text" name="usuario"
		size="30" maxlength="30"
		pattern="[0-9a-zA-Z_@]{5,30}"
		title="No mínimo 5 caracteres ou números, @ ou underline"
		required></p>
	<p>Nome:
		<input type="text" name="nome" 
		size="50" maxlength="50" 
		pattern="[a-zA-Z\sçÇãÃêÊôÔéÉ]{2,50}"
		required></p>
	<p>CPF:
		<input type="number" name="cpf" min="0" 
		required></p>
	<p>Senha:
		<input type="password" name="senha"
		size="10" maxlength="10" 
		pattern="[0-9a-zA-Z_@]{5,10}"
		title="letras e números, @ e underline, no 
		mínimo 5 caractéres"
		 required></p>
	<p>Data nascimento:
		<input type="date" name="datanasci"
		min="1950" max="<?= $usuario->menosCinco() ?>"
		required></p>
	<p><input type="submit" name="botao" value="Cadastrar"></p>
</form>
<?php
if (isset($_POST['botao'])) {
		require_once 'persistence/UsuarioPA.php';

		$usuariopa=new UsuarioPA();

		$usuario->setUsuario($_POST['usuario']);
		$usuario->setNome($_POST['nome']);
		$usuario->setCpf($_POST['cpf']);
		$usuario->setSenha(md5($_POST['senha']));
		$usuario->setDatanasci($_POST['datanasci']);
		
	if ($usuariopa->verificaCpf($usuario->getCpf())) {
		//cpf
		echo "<h2>Cpf digitado já cadastrado!</h2>";
	}else{
		if($usuariopa->verificaUsuario($usuario->getUsuario())){
			//usuario
			echo "<h2>Favor escolher outro nome de usuário!</h2>";
		}else{
		$consulta=$usuariopa->retornaUltimo();
			if(!$consulta){
			$codigo=1;
			}else{
				$linha=$consulta->fetch_assoc();
				$codigo=$linha['ultimo'];
				$codigo++;
			}
			$usuario->setCod_usu($codigo);
			if($usuariopa->cadastrar($usuario)){
			echo "<h2>Usuário cadastrado com sucesso!</h2>";
			}else{
				echo "<h2>Erro na tentativa de cadastro! 
				Tente novamente!</h2>";
			}
		}
	}
}
?>
</body>
</html>