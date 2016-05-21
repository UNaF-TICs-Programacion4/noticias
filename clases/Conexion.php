<?php

/*
*	Incluir el archivo config.cfg con los parametros de la conexión.
*/

include "config.cfg";

Class Conexion {

	protected $link;

	private function conectar(){
		try {
		    $this->link = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		    // set the PDO error mode to exception
		    $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		    
		}
		catch(PDOException $e){
		    echo "Falló la conexión: " . $e->getMessage();
		}
	}

	public function __construct() {
		$this->conectar();
	}
}

?>
