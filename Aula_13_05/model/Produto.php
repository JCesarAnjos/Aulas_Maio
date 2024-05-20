<?php

class Produto{
	private $quantidade;

	public function setProduto($produto){
		$this->produto=$produto;
	}

	public function getProduto(){
		return $this->produto;
	}

	public function setQuantidade($quantidade){
		$this->quantidade=$quantidade;
	}

	public function getQuantidade(){
		return $this->quantidade;
	}

	public function calculaPreco($tipo)
	{
			switch ($tipo){
				case 'Mouse':
				return 20.00;
				break;
				case 'Teclado':
				return 95.60;
				break;
				case 'Monitor':
				return 223.30;
				break;
				//case 'Toner':
				default:
				return 313.50;
				break;
			}
		}
	public function calculatotal($preco, $quantidade)
	{
		return number_format($preco*$quantidade,2,',','.');
	}

}


?>





