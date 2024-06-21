<?php

require_once 'Banco.php';

class CategoriaPA{

	private $con;

	public function __construct(){
		$this->con=new Banco();
	}

	public function cadastrar($categoria)
	{
		$sql="insert into categoria values(".
			$categoria->getCod_cat().",'".
			$categoria->getNome()."',".
			$categoria->getAdministrador().")";
		return $this->con->executar($sql);
	}

	public function retornaUltimo()
	{
		$sql="select max(cod_cat) as 'ultimo' from categoria";
		return $this->con->consultar($sql);
	}

	public function listar()
	{
		$sql="select * from categoria order by cod_cat";
		return $this->con->consultar($sql);
	}

	public function alterar($categoria)
	{
		$sql="update categoria set nome='".$categoria->getNome().
		"' where cod_cat=".$categoria->getCod_cat();
		return $this->con->executar($sql);
	}

	public function excluir($categoria)
	{
		$sql="delete from categoria where cod_cat=".
		$categoria->getCod_cat();
		return $this->con->executar($sql);
	}

	public function verificaNome($nome)
	{
		$sql="select nome from categoria";
		$consulta=$this->con->consultar($sql);
		if(!$consulta){
			return false;
		}else{
			while($linha=$consulta->fetch_assoc()){
				if ($nome==$linha['nome']) {
					return true;
				}
			}
			return false;
		}
	}

	public function converteCodigoNome($codigo)
	{
		$sql="select nome from categoria where cod_cat=$codigo";
		return $this->con->consultar($sql);
	}

}

?>