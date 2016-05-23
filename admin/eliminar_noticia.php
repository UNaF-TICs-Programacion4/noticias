<?php
    include_once "../autoloader.php";
    if ($_POST){
        $id=$_POST['id'];
        $noticia = new Noticia($id);
        try {
            $resultado = $noticia->eliminar();            
        } catch (Exception $e) {
            $resultado = false;
        }

        if ($resultado && !empty($noticia->Noticia_Imagen)){            
            unlink("../img/$noticia->Noticia_Imagen");
        }

    } elseif ($_GET){
        //Visualizo el registro a eliminar.
        $id=$_GET['id'];
        $noticia = new Noticia($id);
    } else {
        die("Error");
    }
    $seccion = new Seccion();
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

    <title>Eliminar Noticia</title>

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
                <h1 class="page-header">Eliminar Noticia</h1>
            </div>
        </div>
        <!-- /.row -->

        
        <div class="container">
            <div class="row col-md-6">
            <?php if(!isset($resultado)) { ?>
                <form method="POST" action="eliminar_noticia.php" enctype="multipart/form-data">
                  <input type="text" value="<?php echo $id; ?>" hidden="true" name="id"></input>
                  <div class="form-group">
                    <label>Título</label>
                    <input type="text" class="form-control" name="titulo" placeholder="Titulo de la Noticia" value="<?php echo $noticia->Noticia_Titulo; ?>" disabled>
                  </div>  
                  <div class="form-group">
                    <label>Sección</label>
                    <select name="seccion" class="form-control">
                        <option value="" selected="false" disabled="true">-- Seleccione la Sección -- </option>
                    <?php foreach ($secciones as $seccion) : ?>
                        <option value="<?php echo $seccion['id']; ?>"
                             <?php if ($seccion['id']==$noticia->Rela_IdSeccion){
                                echo "selected='true'";
                                } 
                              ?> disabled><?php echo $seccion['seccion_descri']; ?></option>
                    <?php endforeach; ?>
                    </select> 
                  </div>  
                  <div class="form-group">
                    <label>Autor</label>
                    <input type="text" class="form-control" name="autor" placeholder="Autor" value="<?php echo $noticia->Noticia_Autor; ?>" disabled>
                  </div>  
                  <div class="form-group">
                    <label>Texto</label>
                    <textarea type="text" class="form-control" name="texto" placeholder="Contenido de la Noticia" value="" rows="10" disabled><?php echo $noticia->Noticia_Texto; ?></textarea>
                  </div>  
                  <div class="form-group">
                    <label>Imágen para Mostrar</label>                                        
                    <?php if(!empty($noticia->Noticia_Imagen)){
                        echo '<img src="../img/'.$noticia->Noticia_Imagen.'" width="500" height="300">';
                        } ?>
                  </div>  
                   <div class="checkbox">
                        <label>
                          <input type="checkbox" name="publicado" <?php echo ($noticia->Noticia_Publicado!=0)?'checked':''; ?> disabled>Publicado
                        </label>
                   </div>      
                  </br>  
                  <button type="submit" name ="btnGuardar" class="btn btn-danger">Eliminar</button>
                  <a href="./" class = "btn btn-default">Cancelar</a>
                        </form>
            <?php } elseif (!$resultado) { ?>
                <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only">Error:</span> No se pudo Eliminar la Noticia <strong><?php echo $noticia->Noticia_Titulo; ?></strong>
                </div>
                </br>
                <a href="./" class = "btn btn-default">Volver</a>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                  <span class="glyphicon glyphicon-glyphicon-ok" aria-hidden="true"></span>
                  <span class="sr-only">Confirmación:</span> La Noticia <strong><?php echo $noticia->Noticia_Titulo; ?></strong> se Eliminó correctamente.
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
