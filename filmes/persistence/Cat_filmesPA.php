<?php

require_once 'Banco.php';

class Cat_filmesPA{

	private $con;

	public function __construct()
	{
		$this->con=new Banco();
	}

	public function cadastrar($cat_filmes)
	{
		$sql="insert into cat_filme values(".
			$cat_filmes->getCod_cat_fil().",".
			$cat_filmes->getCod_fil().",".
			$cat_filmes->getCod_cat().")";
		return $this->con->executar($sql);
	}

	public function retornaUltimo()
	{
		$sql="select max(cod_cat_fill) as 'ultimo' from cat_filme";
		return $this->con->consultar($sql);
	}

	public function listar($filme)
	{
		$sql="select * from cat_filme where cod_fil=".$filme->getCod_fil();
		return $this->con->consultar($sql);
	}

	public function listarCategorias($filme)
	{
		$sql="select cod_cat from cat_filme where cod_fil=".
		$filme->getCod_fil();
		return $this->con->consultar($sql);
	}

	public function excluir($cod_cat_fil)
	{
		$sql="delete from cat_filme where cod_cat_fill=$cod_cat_fil";
		return $this->con->executar($sql);
	}

	public function excluirPorFilme($filme)
	{
		$sql="delete from cat_filme where cod_fil=".
		$filme->getCod_fil();
		return $this->con->executar($sql);
	}

	public function retornaCodigo($cod_fil,$cod_cat)
	{
		$sql="select cod_cat_fill from cat_filme where 
		cod_fil=$cod_fil and cod_cat=$cod_cat";
		return $this->con->consultar($sql);
	}
	
}

?>