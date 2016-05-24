<?php
/*
*  Incluir el archivo config.cfg con los parametros de la conexión.
*/
include "config.cfg";

Class Db_Noticia {
  public $conn;

  public function __construct() {
	try {
		$this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		// set the PDO error mode to exception
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Conexión exitosa.";
	}
	catch(PDOException $e){
		die ("Falló la conexión: " . $e->getMessage());
		}
	}
}
?>
