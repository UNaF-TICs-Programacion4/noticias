 <?php 
        if (isset($_POST['btnLogin'])) {
        require_once ('../conectar.php');
        require_once('../classlogin.php');
        $consultas= new login();
        $email=$_POST["inputEmail"];
        $pass= $_POST["inputPassword"];
        if (empty( $email) || empty($pass)) {
            echo 'completar';}
        else{
        $verificar= $consultas->logearse($email, $pass);
        echo $verificar;
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

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <form class="form-signin" method="POST" action="login.php">
        <h2 class="form-signin-heading">Panel de Administración</h2>        
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Correo Electrónico" required autofocus >
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="inputPassword">
        <button class="btn btn-lg btn-primary" type="submit" name="btnLogin">Ingresar</button>
        <a href="../" class="btn btn-lg btn-success">Página Principal</a>
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
