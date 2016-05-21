<?php
    include_once "../autoloader.php";
    if ($_POST){
        $id=$_POST['id'];
        $seccion = new Seccion($id);
        $resultado = $seccion->eliminar();
    } elseif ($_GET){
        //Visualizo el registro a eliminar.
        $id=$_GET['id'];
        $seccion = new Seccion($id);
    } else {
        die("Error");
    }
    
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
                <a class="navbar-brand" href="./">NoticiasNEA</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Eliminar Sección</h1>
            </div>
        </div>
        <!-- /.row -->

        
        <div class="container">
            <div class="row col-md-6">
            <?php if(!isset($resultado)) { ?>
                <form method="POST" action="elimiar_seccion.php">
                  <div class="form-group">
                    <input type="text" value="<?php echo $id; ?>" hidden="true"></input>
                    <label>Sección</label>
                    <input type="text" class="form-control" name="descri" placeholder="Nombre de la Sección" value="<?php echo $seccion->Seccion_Descri; ?>" disabled>
                  </div>  

                  </br>  
                  <button type="submit" name ="btnGuardar" class="btn btn-danger">Eliminar</button>
                  <a href="./" class = "btn btn-default">Volver</a>
                </form>
            <?php } elseif (!$resultado) { ?>
                <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only">Error:</span> No se pudo eliminar la Sección <?php echo $seccion->seccion_descri; ?>
                </div>
                </br>
                <a href="./" class = "btn btn-default">Volver</a>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                  <span class="glyphicon glyphicon-glyphicon-ok" aria-hidden="true"></span>
                  <span class="sr-only">Confirmación:</span> La Sección <?php echo $seccion->Seccion_Descri; ?> se Eliminó correctamente.
                </div>     
                </br>
                <a href="./" class = "btn btn-default">Volver</a>           
            <?php } ?>
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
