<!DOCTYPE html>
<html lang="es">

<head>
	<?php
	require_once dirname(__FILE__)."/../classes/seccion.php";
	?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home - NoticiasNEA</title>

	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../css/1-col-portfolio.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="../">NoticiasNEA</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="alta_noticia.php">Nueva Noticia</a>
					</li>
					<li>
						<a href="alta_seccion.php">Nueva Sección</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php">Salir</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<!-- Page Content -->
	<div class="container">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Panel de Administración</h1>
			</div>
		</div>

		<?php
		if (!empty($_POST["btnGuardar"]) and $_POST["btnGuardar"] == "AltaSeccion") {
			$seccion = new seccion();
			$seccion->seccion_descri = $_POST["descri"];
			$seccion->Insertar();
		} elseif (!empty($_POST["btnGuardar"]) and $_POST["btnGuardar"] == "BajaSeccion") {
			$seccion = new seccion($_POST["id"]);
			$seccion->Eliminar();
		} elseif (!empty($_POST["btnGuardar"]) and $_POST["btnGuardar"] == "ModifSeccion") {
			$seccion = new seccion($_POST["id"]);
			$seccion->seccion_descri = $_POST["descri"];
			$seccion->Actualizar();
		}
		?>
		<!-- /.row -->
		<div class="container-fluid">
		<div class="row">
			<h2>Noticias</h2>
			<p>Listado de Noticias</p>
			<table class="table table-striped">
			<thead>
				<tr>
					<th>#ID</th>
					<th>Título</th>
					<th>Sección</th>
					<th>F. de Publicación</th>
					<th>Autor</th>
					<th>Contenido</th>
					<th>Imágen</th>
					<th>Publicado</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Noticia 1</td>
					<td>Deportes</td>
					<td>15/05/2016 16:55</td>
					<td>Juan Perez García</td>
					<td><a href="editar_noticia.php">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</a></td>
					<td>imagen.jpg</td>
					<td><input type="checkbox" value="true"></input></td>
					<td><a href="eliminar_noticia.php"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
			</tbody>
			</table>
		</div>
		</div>
		<div class="container-fluid">
		<div class="row">
			<h2>Secciones</h2>
			<p>Listado de Secciones:</p>
			<table class="table table-striped">
			<thead>
				<tr>
				<th>#ID</th>
				<th>Descripción</th>
				<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$stmt = seccion::Traer();
				while ($seccion = $stmt->fetch()) {
					echo '
						<tr>
							<td>'.$seccion->id.'</td>
							<td><a href="editar_seccion.php?id='.$seccion->id.'">'.$seccion->seccion_descri.'</a>
							</td>
							<td><a href="eliminar_seccion.php?id='.$seccion->id.'"><span class="glyphicon glyphicon-remove"></span></a>
							</td>
						</tr>
					';
				}
				?>

			</tbody>
			</table>
		</div>
		</div>

		<hr>

		<!-- Footer -->
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; Noticias NEA 2016</p>
				</div>
			</div>
			<!-- /.row -->
		</footer>

	</div>
	<!-- /.container -->

	<!-- jQuery -->
	<script src="../js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

</body>

</html>
