<?php
    include_once "autoloader.php";    

    if (empty($_GET['id'])){
        /*
        * Si no estoy filtrando la Noticia, vuelvo al inicio
        */
       header("Location: ./");
    } else {
        $id = $_GET['id'];
        $noticia = new Noticia($id);
    }

?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Pagina Principal">

    <title><?php echo $noticia->Noticia_Titulo; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

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
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $noticia->Noticia_Titulo; ?></h1>

                <!-- Author -->
                <p class="lead">
                    Por <a href="#"><?php echo $noticia->Noticia_Autor; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Publicado el <?php echo FechayHora::FechaFormatoCorto($noticia->noticia_fecha_alta()) . " a las " . FechayHora::HoraFormatoCorto($noticia->noticia_fecha_alta()); ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="img/<?php echo $noticia->Noticia_Imagen; ?>" alt="" width="900" height="300">

                <hr>

                <!-- Post Content -->
                <p><?php echo nl2br($noticia->Noticia_Texto); ?></p>

                <hr>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; NoticiasNEA 2016</p>
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
