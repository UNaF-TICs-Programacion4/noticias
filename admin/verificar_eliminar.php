<?php
require_once '../conectar.php';
require_once '../classlogin.php';
   $msj="Verificar los datos a eliminar";
   $usuario = trim($_POST['inputUsuario']);
   $email = trim($_POST['inputEmail']);
   $pass = trim($_POST['inputPassword']);
   
   $mostrar= new login();
   $fila=$mostrar->seleccionar_usuario($usuario, $email, $pass);
   $usuario=$fila['admin_usuario'];
   $pass=$fila['admin_password'];
   $email=$fila['admin_email'];
   if(isset($_POST['eliminar'])){
    //establezco para que las cajas de texto sean solo lectura
   $readonly="readonly='readonly'";
   $boton="veliminar";
   }
   if (isset($_POST['modificar'])) {
    //establezco para que las cajas de texto se puedan modificar
    $readonly="";
    $boton="vmodificar";
   }
   
   if(isset($_POST['veliminar'])){
      try
      {
          $readonly="";
         $noticia = new Db_Noticia();
         $conexion=$noticia->conn;
         $registro= new login();
            if($registro->eliminarusuario($usuario,$email,$pass))
            {
                header('location:login.php');
            }
         }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  }

  if(isset($_POST['vmodificar'])){
      try
      {
          $pass=$_POST['inputPassword'];
         $registro= new login();
            if($registro->modificar_usuario($usuario,$pass))
            {
                header('location:login.php');
            }
         }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  }
  ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Panel de Administración</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <form class="form-signin" method="POST" action="verificar_eliminar.php">
        <h2 class="form-signin-heading"><?php echo $msj ?></h2>        
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" value="<?php echo $email ?>" readonly="readonly" required autofocus >
        <label for="inputUsuario" class="sr-only">Usuario</label>
        <input type="input" name="inputUsuario" id="inputUsuario" class="form-control" value="<?php echo $usuario ?>" readonly="readonly" required>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="input" id="inputPassword" class="form-control" value="<?php echo $pass ?>" <?php echo $readonly ?> required name="inputPassword">
        <button class="btn btn-lg btn-primary" type="submit" name=<?php echo $boton ?>>Verificar</button>
      </form>
    </div> <!-- /container -->

    <hr>

        <!-- Footer -->
        <footer>
            <div class="container">
                    <p>Copyright &copy; Noticias NEA 2016</p>
            </div>
            <!-- /.row -->
        </footer>



  </body>
</html>