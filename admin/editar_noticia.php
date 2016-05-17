
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
                <h1 class="page-header">Modificar Noticia</h1>
            </div>
        </div>
        <!-- /.row -->

        
        <div class="container">
            <div class="row col-md-6">
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Título</label>
                    <input type="text" class="form-control" name="descri" placeholder="Titulo de la Noticia" >
                  </div>  
                  <div class="form-group">
                    <label>Sección</label>
                    <select name="seccion" class="form-control">
                        <option value="" selected="false" disabled="true">-- Seleccione la Sección -- </option>
                            <option value="">Deportes</option>
                            <option value="">Locales</option>
                            <option value="">Internacionales</option>
                            <option value="">Espectáculos</option>
                    </select> 
                  </div>  
                  <div class="form-group">
                    <label>Autor</label>
                    <input type="text" class="form-control" name="autor" placeholder="Autor">
                  </div>  
                  <div class="form-group">
                    <label>Texto</label>
                    <textarea type="text" class="form-control" name="texto" placeholder="Contenido de la Noticia"></textarea>
                  </div>  
                  <div class="form-group">
                    <label>Imágen para Mostrar</label>
                    <input type="file" value="archivo" name="imagen">
                    <p class="help-block">Busque y seleccione una imagen en su PC.</p>
                    <br>
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                  </div>  
                   <div class="checkbox">
                        <label>
                          <input type="checkbox">Publicar
                        </label>
                   </div>      
                  </br>  
                  <button type="submit" name ="btnGuardar" class="btn btn-primary">Modificar</button>
                  <a href="./" class = "btn btn-default">Cancelar</a>
                </form>
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
