<?php

/**
* Clase Sección.
*/
class Seccion extends Conexion 
{
	private $id;
	public $Seccion_Descri;
	const TABLA = 'seccion';
	
	function __construct($id=0){
		parent::__construct();
		if ($id != 0){
			$seccion = $this->seleccionarId($id)->fetch(PDO::FETCH_ASSOC);
			$this->id = $seccion['id'];
			$this->Seccion_Descri = $seccion['seccion_descri'];
		}
	}

	public function id(){
		return $this->id;
	}

	public  function seleccionarFiltro($filtro=""){
		$query = "SELECT * FROM ".self::TABLA;
		if (!empty($filtro)){
			 $query .= " WHERE $filtro";			
		}		
		$resultado = $this->link->query($query);
		return $resultado;

	}

	public  function seleccionarId($id=0){
		if (!empty($id)){
			$query = "SELECT * FROM ". self::TABLA ." WHERE id=$id";
		}
		$resultado = $this->link->query($query);
		return $resultado;
	}

	public function insertar(){	
		$query = "INSERT INTO ". self::TABLA ." (seccion_descri) VALUES ('$this->Seccion_Descri')";		
		$resultado = $this->link->query($query);
		return $resultado;
	}

	public function actualizar(){
		$query = "UPDATE ". self::TABLA ." SET seccion_descri = '$this->Seccion_Descri' WHERE id = $this->id";		
		$resultado = $this->link->query($query);
		return $resultado;
	}

	public function eliminar(){
		$query = "DELETE FROM ". self::TABLA ." WHERE id = $this->id";		
		$resultado = $this->link->query($query);
		return $resultado;		
	}
}