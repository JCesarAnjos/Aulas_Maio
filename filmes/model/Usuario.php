<?php

class Usuario{

	private $cod_usu;
	private $usuario;
	private $nome;
	private $cpf;
	private $senha;
	private $datanasci;

	public function setCod_usu($cod_usu)
	{
		$this->cod_usu=$cod_usu;
	}

	public function getCod_usu()
	{
		return $this->cod_usu;
	}

	public function setUsuario($usuario)
	{
		$this->usuario=$usuario;
	}

	public function getUsuario()
	{
		return $this->usuario;
	}

	public function setNome($nome)
	{
		$this->nome=$nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setCpf($cpf)
	{
		$this->cpf=$cpf;
	}

	public function getCpf()
	{
		return $this->cpf;
	}

	public function setSenha($senha)
	{
		$this->senha=$senha;
	}

	public function getSenha()
	{
		return $this->senha;
	}

	public function setDatanasci($datanasci)
	{
		$this->datanasci=$datanasci;
	}

	public function getDatanasci()
	{
		return $this->datanasci;
	}

	public function logar($usuario)
	{
		setcookie('usuario',$usuario,time()+172800);
	}

	public function deslogar()
	{
		setcookie('usuario','');
	}

	public function menosCinco()
	{
		$hoje=date('Y-m-d');
		$novadata=date('Y-m-d',strtotime($hoje.' -5 year'));
		return $novadata;
	}
	

}

?>