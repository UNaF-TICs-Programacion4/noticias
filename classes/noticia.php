<?php
require_once dirname(__FILE__)."/../conectar.php";

class noticia {
	public $id;
	public $rela_idseccion;
	public $noticia_titulo;
	public $noticia_fecha_alta;
	public $noticia_autor;
	public $noticia_texto;
	public $noticia_imagen;
	public $noticia_publicado;

	function __construct($id = 0) {
		if ($id != 0) {
			$db = new Db_Noticia();
			$conn = $db->conn;
			try {
				$stmt = $conn->prepare("SELECT * FROM noticia WHERE seccion.id=:id");
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				$stmt->execute();

				// set the resulting array to associative
				$stmt->setFetchMode(PDO::FETCH_CLASS, "noticia");
				if ($noticia = $stmt->fetch()) {
					$this->id = $noticia->id;
					$this->rela_idseccion = $noticia->rela_idseccion
					$this->noticia_titulo = $noticia->noticia_titulo
					$this->noticia_fecha_alta = $noticia->noticia_fecha_alta
					$this->noticia_autor = $noticia->noticia_autor
					$this->noticia_texto = $noticia->noticia_texto
					$this->noticia_imagen = $noticia->noticia_imagen
					$this->noticia_publicado = $noticia->noticia_publicado
				}
			}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();	// Más adelante manejar el error de alguna manera más amigable con el usuario ===Revisar===
			}
			$conn = null;
		}
	}

	function Insertar() {
		// Obtener los campos del registro correspondientes a ese id
		$db = new Db_Noticia();
		$conn = $db->conn;
		try {
			$stmt = $conn->prepare('INSERT INTO seccion (seccion_descri) VALUES (:seccion_descri)');
			$stmt->bindParam(':seccion_descri', $this->seccion_descri, PDO::PARAM_STR);
			$rows = $stmt->execute();

			//if ($rows == 1)
			// echo 'Inserción correcta';
		} catch(PDOException $e) {
			die('Error: ' . $e->getMessage());	// Más adelante manejar el error de alguna manera más amigable con el usuario ===Revisar===
		}
		$conn = null;
	}

	function Actualizar() {
		// Actualizar el registro seleccionado en el objeto
		$db = new Db_Noticia();
		$conn = $db->conn;
		try {
			$stmt = $conn->prepare('UPDATE seccion SET seccion_descri=:seccion_descri WHERE id =:id');
			$stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
			$stmt->bindParam(':seccion_descri', $this->seccion_descri, PDO::PARAM_STR);
			$rows = $stmt->execute();
			//if ($rows > 0)
				// echo 'Actualización correcta';
		} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();	// Más adelante manejar el error de alguna manera más amigable con el usuario ===Revisar===
		}
		$conn = null;
	}

	function Eliminar() {
		$db = new Db_Noticia();
		$conn = $db->conn;
		try {
			$stmt = $conn->prepare('DELETE FROM seccion WHERE id =:id');
			$stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
			$rows = $stmt->execute();
			//if ($rows > 0)
				// echo 'Actualización correcta';
		} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();	// Más adelante manejar el error de alguna manera más amigable con el usuario ===Revisar===
		}
		$conn = null;
	}

	static function Traer() {
		$db = new Db_Noticia();
		$conn = $db->conn;

		$stmt = $conn->query("SELECT * FROM seccion");

		if (!$stmt) die ("Error: ".$stmt."<br>".$conn->error);

		$conn = null;

		$stmt->setFetchMode(PDO::FETCH_CLASS, 'seccion');
		// La rutina llamadora se encarga de mostrar el resultado según el contexto
		return $stmt;
	}
}
?>
