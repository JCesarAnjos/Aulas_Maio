<?php

class Banco{

	private $conexao;
	private $usuario;
	private $senha;
	private $banco;
	private $url;

	public function __construct(){
		$this->usuario='root';
		$this->senha='';
		$this->banco='filmes';
		$this->url='localhost';
		$this->conexao=new mysqli($this->url,$this->usuario,
			$this->senha,$this->banco);
	}

	public function executar($sql)
	{
		if($this->conexao->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	public function consultar($sql)
	{
		$consulta=$this->conexao->query($sql);
		$linhas=$consulta->num_rows;
		if($linhas>0){
			return $consulta;
		}else{
			return false;
		}
	}

}

?>