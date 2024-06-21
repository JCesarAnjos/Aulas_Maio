<?php

require_once 'Banco.php';

class UsuarioPA{

	private $con;

	public function __construct(){
		$this->con=new Banco();
	}

	public function cadastrar($usuario)
	{
		$sql="insert into usuario values(".
			$usuario->getCod_usu().",'".
			$usuario->getUsuario()."','".
			$usuario->getNome()."',".
			$usuario->getCpf().",'".
			$usuario->getSenha()."','".
			$usuario->getDatanasci()."')";
		//var_dump($sql);
		return $this->con->executar($sql);
	}

	public function retornaUltimo()
	{
		$sql="select max(cod_usu) as 'ultimo' from usuario";
		return $this->con->consultar($sql);
	}

	public function logar($usuario,$senha)
	{
		$sql="select usuario,senha from usuario";
		$consulta=$this->con->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			while ($linha=$consulta->fetch_assoc()) {
				if ($usuario==$linha['usuario']) {
					if ($senha==$linha['senha']) {
						return true;
					}
				}
			}
			return false;
		}
	}

	public function verificaCpf($cpf)
	{
		$sql="select cpf from usuario";
		$consulta=$this->con->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			while($linha=$consulta->fetch_assoc()){
				if ($cpf==$linha['cpf']) {
					return true;
				}
			}
			return false;
		}
	}

	public function verificaUsuario($usuario)
	{
		$sql="select usuario from usuario";
		$consulta=$this->con->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			while($linha=$consulta->fetch_assoc()){
				if ($usuario==$linha['usuario']) {
					return true;
				}
			}
			return false;
		}
	}

	public function listar($usuario)
	{
		$sql="select * from usuario where usuario='$usuario'";
		return $this->con->consultar($sql);
	}

	public function alterar($usuario)
	{
		$sql="update usuario set usuario='".
			$usuario->getUsuario()."', nome='".
			$usuario->getNome()."', senha='".
			$usuario->getSenha()."', datanasci='".
			$usuario->getDatanasci()."' where
			cod_usu=".$usuario->getCod_usu();
		return $this->con->executar($sql);
	}

}

?>