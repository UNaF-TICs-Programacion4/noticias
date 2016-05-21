<?php
    include_once "../autoloader.php";
    $noticia = new Noticia();
    $seccion = new Seccion();
    $noticias = $noticia->seleccionarFiltro()->fetchAll();
    $secciones = $seccion->seleccionarFiltro()->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>

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
                    <li><a href="../">Salir</a></li>
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
            <?php foreach ($noticias as $noticia) : ?>        
              <tr>
                <td><?php echo $noticia['id']; ?></td>
                <td><a href="editar_noticia.php?id=<?php echo $noticia['id']; ?>"><?php echo utf8_encode($noticia['noticia_titulo']); ?></a></td>
                <td><?php echo $noticia['seccion_descri']; ?></td>
                <td><?php echo $noticia['noticia_fecha_alta']; ?></td>
                <td><?php echo $noticia['noticia_autor']; ?></td>
                <td><?php echo utf8_encode(substr($noticia['noticia_texto'],0,150))."..."; ?></a></td>
                <td><?php echo $noticia['noticia_imagen']; ?></td>
                <td><input type="checkbox" <?php echo ($noticia['noticia_publicado']!=0)?'checked':''; ?> disabled></input></td>
                <td><a href="eliminar_noticia.php?id=<?php echo $noticia['id']; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
            <?php endforeach; ?>                            
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
              <?php foreach($secciones as $seccion) : ?>
                  <tr>
                    <td><?php echo $seccion['id'] ?></td>
                    <td><a href="editar_seccion.php?id=<?php echo $seccion['id'] ?>"><?php echo $seccion['seccion_descri'] ?></a>
                    </td>
                    <td><a href="eliminar_seccion.php?id=<?php echo $seccion['id'] ?>"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>              
                  </tr>    
              <?php endforeach; ?>
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
