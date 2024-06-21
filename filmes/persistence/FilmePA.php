<?php

require_once 'Banco.php';

class FilmePA{

	private $con;

	public function __construct(){
		$this->con=new Banco();
	}

	public function cadastrar($filme)
	{
		$sql="insert into filme values(".
			$filme->getCod_fil().",'".
			$filme->getTitulo()."','".
			$filme->getDiretor()."','".
			$filme->getRoteirista()."','".
			$filme->getAtores()."','".
			$filme->getCartaz()."','".
			$filme->getTrailer()."',".
			$filme->getAdministrador().")";
		return $this->con->executar($sql);
	}

	public function retornaUltimo()
	{
		$sql="select max(cod_fil) as 'ultimo' from filme";
		return $this->con->consultar($sql);
	}

	public function verificaTitulo($filme)
	{
		$sql="select titulo from filme";
		$consulta=$this->con->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			while($linha=$consulta->fetch_assoc()){
				if ($filme->getTitulo()==$linha['titulo']) {
					return true;
				}
			}
			return false;
		}
	}

	public function listar($limite,$offset)
	{
		$sql="select * from filme order by cod_fil limit $limite offset $offset";
		$consulta=$this->con->consultar($sql);
		if (!$consulta) {
			return false;
		}else{
			return $consulta;
		}
	}


	public function contar()
	{
		$sql="select count(*) as 'linhas' from filme";
		return $this->con->consultar($sql);
	}
	
	public function buscar($titulo)
	{
		$sql="select * from filme where titulo like '%$titulo%'";
		return $this->con->consultar($sql);
	}

	public function buscarPorCodigo($codigo)
	{
		$sql="select * from filme where cod_fil=$codigo";
		return $this->con->consultar($sql);
	}

	public function alterar($filme)
	{
		$sql="update filme set titulo='".
		$filme->getTitulo()."', diretor='".
		$filme->getDiretor()."', roteirista='".
		$filme->getRoteirista()."', atores='".
		$filme->getAtores()."', cartaz='".
		$filme->getCartaz()."', trailer='".
		$filme->getTrailer()."' where cod_fil=".
		$filme->getCod_fil();
		return $this->con->executar($sql);
	}

	public function excluir($filme)
	{
		$sql="delete from filme where cod_fil=".$filme->getCod_fil();
		return $this->con->executar($sql);
	}

	
}

?>