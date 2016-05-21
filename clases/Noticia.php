<?php

/**
* Clase Noticia.
*/
class Noticia extends Conexion
{
	private $Id;	
	public $Rela_IdSeccion;
	public $Noticia_Titulo;
	private $Noticia_Fecha_Alta;
	public $Noticia_Autor;
	public $Noticia_Texto;
	public $Noticia_Imagen;
	public $Noticia_Publicado;
	const TABLA = 'noticia';
	
	function __construct($id=0){
		parent::__construct();
		if ($id != 0){
			$noticia = $this->seleccionarId($id)->fetch(PDO::FETCH_ASSOC);
			if ($noticia){
				$this->Id = $noticia['id'];
				$this->Noticia_Titulo = $noticia['noticia_titulo'];
				$this->Rela_IdSeccion = $noticia['rela_idseccion'];
				$this->Noticia_Fecha_Alta = $noticia['noticia_fecha_alta'];
				$this->Noticia_Autor = $noticia['noticia_autor'];
				$this->Noticia_Texto = $noticia['noticia_texto'];
				$this->Noticia_Imagen = $noticia['noticia_imagen'];
				$this->Noticia_Publicado = $noticia['noticia_publicado'];
			}
		}

	}

	public function noticia_fecha_alta(){
		return $this->Noticia_Fecha_Alta;
	}


	public function seleccionarFiltro($filtro=""){
		$query = "SELECT * FROM ". self::TABLA .",seccion WHERE rela_idseccion = seccion.id";
		if (!empty($filtro)){
			 $query .= " And $filtro";			
		}	
		$resultado = $this->link->query($query);
		return $resultado;

	}

	public  function seleccionarId($id=0){
		if ($id != 0){
			$query = "SELECT * FROM ". self::TABLA .",seccion WHERE rela_idseccion = seccion.id And ". self::TABLA.".id=$id";
		}		
		$resultado = $this->link->query($query);
		return $resultado;
	}

	public function insertar(){	
		$query = "INSERT INTO ". self::TABLA ." (rela_idseccion, noticia_titulo, noticia_autor, noticia_texto, noticia_imagen, noticia_publicado) VALUES ($this->Rela_IdSeccion, $this->Noticia_Titulo, $this->Noticia_Autor, $this->Noticia_Texto, $this->Noticia_Imagen, $this->Noticia_Publicado)";		
		$resultado = $this->link->query($query);
		return $resultado;
	}

	public function actualizar(){
		$query = "UPDATE ". self::TABLA ." SET rela_idseccion = $this->Rela_IdSeccion
					, noticia_titulo = $this->Noticia_Titulo
					, noticia_texto = $this->Noticia_Texto
					, noticia_imagen = $this->Noticia_Imagen
					, noticia_publicado = $this->Noticia_Publicado
					WHERE id = $this->Id";		
		$resultado = $this->link->query($query);
		return $resultado;
	}

	public function eliminar(){
		$query = "DELETE FROM ". self::TABLA ." WHERE id = $this->Id";		
		$resultado = $this->link->query($query);
		return $resultado;		
	}
}