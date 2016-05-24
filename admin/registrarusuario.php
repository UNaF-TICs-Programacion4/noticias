<?php
require_once '../conectar.php';
require_once '../classlogin.php';

if(isset($_POST['registrar']))
{
   $usuario = trim($_POST['inputUsuario']);
   $email = trim($_POST['inputEmail']);
   $pass = trim($_POST['inputPassword']);
   $vpass=trim($_POST['inputVPassword']); 
      if($pass<>$vpass) {
            echo $error = "las contraseñas no coinciden !";
        }
        else
        {
      try
      {
         $noticia = new Db_Noticia();
         $conexion=$noticia->conn;
         $stmt = $conexion->prepare("SELECT admin_usuario,admin_email FROM admin WHERE admin_usuario=:usuario OR admin_email=:email");
         $stmt->execute(array(':usuario'=>$usuario, ':email'=>$email));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['admin_usuario']==$usuario) {
            echo $error = "sorry username already taken !";
         }
         else if($row['admin_email']==$email) {
            echo $error = "sorry email id already taken !";
         }
         else
         {
            $registro= new login();
            if($registro->registrarusuario($usuario,$email,$pass))

            {
                header('location:login.php');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
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
      <form class="form-signin" method="POST" action="registrarusuario.php">
        <h2 class="form-signin-heading">Registrar Usuario</h2>        
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Correo Electrónico" required autofocus >
        <label for="inputUsuario" class="sr-only">Usuario</label>
        <input type="input" name="inputUsuario" id="inputUsuario" class="form-control" placeholder="Usuario" required>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="inputPassword">
        <label for="inputPassword" class="sr-only">Verificar Contraseña</label>
        <input type="password" id="inputVPassword" class="form-control" placeholder="Password" required name="inputVPassword">
        <button class="btn btn-lg btn-primary" type="submit" name="registrar">Registrar</button>
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
