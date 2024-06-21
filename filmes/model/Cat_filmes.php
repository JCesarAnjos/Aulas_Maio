<?php

class Cat_filmes{

	private $cod_cat_fil;
	private $cod_fil;
	private $cod_cat;

	public function setCod_cat_fil($cod_cat_fil)
	{
		$this->cod_cat_fil=$cod_cat_fil;
	}

	public function getCod_cat_fil()
	{
		return $this->cod_cat_fil;
	}

	public function setCod_fil($cod_fil)
	{
		$this->cod_fil=$cod_fil;
	}

	public function getCod_fil()
	{
		return $this->cod_fil;
	}

	public function setCod_cat($cod_cat)
	{
		$this->cod_cat=$cod_cat;
	}

	public function getCod_cat()
	{
		return $this->cod_cat;
	}

}

?>