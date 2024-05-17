<?php

class Hospedagem{

	private $quarto;
	private $valorh;
	private $horachegada;
	private $diachegada;

	public function setQuarto($quarto)
	{
		$this->quarto;
	}

	public function getQuarto()
	{
		return $this->quarto;
	}

	public function getValorh($quarto)
	{
		switch ($quarto) {
			case ($quarto>=1 && $quarto<=10):
				return 30.00;
				break;
			
			case ($quarto>=11 && $quarto<=20):
				return 60.00;
				break;

			case ($quarto>=21 && $quarto<=30):
				return 90.00;
			default:
				return 45.00;
				break;
		}
	}
	public  function setHoraChegada($horachegada)
	{
		$this->horachegada=$horachegada;
	}
	public function getHoraChegada()
	{
		return $this->horachegada;
	}
	public function setDiaChegada($diachegada)
	{
		$this->diachegada=$diachegada;
	}
	public function getDiaChegada()
	{
		return $this->diachegada;
	}

	public function calcularTotal($valorh,$diachegada,$horachegada)
	{
		date_default_timezone_set('America/Sao_Paulo');
		$chegada=$diachegada." ".$horachegada;

		$hoje=date("Y-m-d H:i:s");
		$chegada=new DateTime($chegada);
		$hoje= new DateTime($hoje);
		$diferenca=$hoje->diff($chegada);
		$total=$valorh*($diferenca->d*24+$diferenca->h+$diferenca->i/60);
		return number_format($total,2,",",".");
	}
	}
	
	

?>