<?php

require_once 'Banco.php';

class AdministradorPA{

	private $con;

	public function __construct(){
		$this->con=new Banco();
	}

	public function logar($usuario,$senha)
	{
		$sql="select usuario,senha from administrador";
		$consulta=$this->con->consultar($sql);
		if(!$consulta){
			return false;
		}else{
			while($linha=$consulta->fetch_assoc()){
				if($usuario==$linha['usuario']){
					if($senha==$linha['senha']){
						return true;
					}
				}
			}
			return false;
		}
	}

	public function retornaCodigo($usuario)
	{
		$sql="select cod_adm from administrador where usuario='$usuario'";
		return $this->con->consultar($sql);
	}

	public function converteCodigoNome($codigo)
	{
		$sql="select usuario from administrador where cod_adm=$codigo";
		return $this->con->consultar($sql);
	}
}

?>