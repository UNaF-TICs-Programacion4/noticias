<?php

$servername = "localhost";
$username = "prog4";
$password = "prog4";

try {
    $conn = new PDO("mysql:host=$servername;dbname=db_noticias", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa.";
    }
catch(PDOException $e)
    {
    echo "Falló la conexión: " . $e->getMessage();
    }

// Para prueba de conexión. Después quitar.
// $conn = null;

?>
