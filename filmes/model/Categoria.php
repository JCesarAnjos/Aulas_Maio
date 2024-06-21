<?php

class Categoria{

	private $cod_cat;
	private $nome;
	private $administrador;

	public function setCod_cat($cod_cat)
	{
		$this->cod_cat=$cod_cat;
	}

	public function getCod_cat()
	{
		return $this->cod_cat;
	}

	public function setNome($nome)
	{
		$this->nome=$nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setAdministrador($administrador)
	{
		$this->administrador=$administrador;
	}

	public function getAdministrador()
	{
		return $this->administrador;
	}
    
}

?>