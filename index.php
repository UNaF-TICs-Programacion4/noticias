<?php
	include_once "autoloader.php";
    $noticia = new Noticia();
    $seccion = new Seccion();
    if (empty($_GET['idsec'])){
        /*
        * Si no estoy filtrando la Seccion, entonces traigo todo.
        */
	   $noticias = $noticia->seleccionarFiltro()->fetchAll();
    } else {
        $rela_idseccion = $_GET['idsec'];
        $noticias = $noticia->seleccionarFiltro("rela_idseccion = $rela_idseccion")->fetchAll();
    }

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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

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
                <a class="navbar-brand" href="./">NoticiasNEA</a>
            </div>
            <!-- Un link para cada Seccion -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php foreach ($secciones as $seccion) : ?>
                        
                        <li>
                            <a href="<?php echo "index.php?idsec={$seccion['id']}"; ?>"><?php echo $seccion['seccion_descri']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./admin/index.php">Administración</a></li>
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
                <h1 class="page-header">Noticias NEA
                    <small>Periodismo de Opinión</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Noticia Uno -->
        <?php foreach ($noticias as $noticia) : ?>
        <div class="row">
            <div class="col-md-7">
                <a href="ver_noticia.php?id=<?php echo $noticia['id']; ?>">
                    <img class="img-responsive" src="img/<?php echo $noticia['noticia_imagen']; ?>" alt="" width="700" heigth="300">
                </a>
            </div>
            <div class="col-md-5">
                <h3><?php echo utf8_encode($noticia['noticia_titulo']); ?></h3>
                <h4><?php echo utf8_encode($noticia['seccion_descri']); ?></h4>
                <p><i><?php echo date('D, d M Y H:i:s',$noticia['noticia_fecha_alta']); ?></i></p>
                <p><?php echo utf8_encode(substr($noticia['noticia_texto'],0,150))."..."; ?></p>
                <a class="btn btn-primary" href="ver_noticia.php?id=<?php echo $noticia['id']; ?>">Ver Noticia<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <hr>
        <?php endforeach; ?>
        <!-- /.row -->

        
        <!--
        Comentamos por ahora la paginación
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        -->
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
