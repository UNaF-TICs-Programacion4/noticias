<?php

/*
*	Incluir el archivo config.cfg con los parametros de la conexión.
*/

include "config.cfg";

Class Db_Noticia {


	public function __construct() {
		try {
		    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    echo "Conexión exitosa.";
		}
		catch(PDOException $e){
		    echo "Falló la conexión: " . $e->getMessage();
		    }
	}
}

?>
