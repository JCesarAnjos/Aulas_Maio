<?php

class Cliente{
	private $nome;
	private $rg;
	private $email;

	public function setNome($nome){
		$this->nome=$nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setRg($rg){
		$this->rg=$rg;
	}

	public function getRg(){
		return $this->rg;
	}
	public function setEmail($email){
		$this->nome=$email;
	}

	public function getEmail(){
		return $this->email;
	}
}
?>