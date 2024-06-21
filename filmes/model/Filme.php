<?php

class Filme{

	private $cod_fil;
	private $titulo;
	private $diretor;
	private $roteirista;
	private $atores;
	private $cartaz;
	private $trailer;
	private $adminsitrador;

	public function setCod_fil($cod_fil)
	{
		$this->cod_fil=$cod_fil;
	}

	public function getCod_fil()
	{
		return $this->cod_fil;
	}

	public function setTitulo($titulo)
	{
		$this->titulo=$titulo;
	}

	public function getTitulo()
	{
		return $this->titulo;
	}

	public function setDiretor($diretor)
	{
		$this->diretor=$diretor;
	}

	public function getDiretor()
	{
		return $this->diretor;
	}

	public function setRoteirista($roteirista)
	{
		$this->roteirista=$roteirista;
	}

	public function getRoteirista()
	{
		return $this->roteirista;
	}

	public function setAtores($atores)
	{
		$this->atores=$atores;
	}

	public function getAtores()
	{
		return $this->atores;
	}

	public function setCartaz($cartaz)
	{
		$this->cartaz=$cartaz;
	}

	public function getCartaz()
	{
		return $this->cartaz;
	}

	public function setTrailer($trailer)
	{
		$this->trailer=$trailer;
	}

	public function getTrailer()
	{
		return $this->trailer;
	}

	public function setAdministrador($administrador)
	{
		$this->administrador=$administrador;
	}

	public function getAdministrador()
	{
		return $this->administrador;
	}

	public function verificaTamanho($imagem)
	{
		$tamanho=filesize($imagem);
		if($tamanho>65535){
			return false;
		}else{
			return true;
		}
	}
}

?>