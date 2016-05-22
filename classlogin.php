
<?php
    class login{

        public function logearse($email, $pass){
            $noticia = new Db_Noticia();
            $conexion=$noticia->conn;
            $sql="select * from admin where admin_email= :email and admin_password= :pass";
            $sentencia=$conexion->prepare($sql);
            $sentencia->bindparam(':email', $email);
            $sentencia->bindparam(':pass', $pass);
                $sentencia->execute();
                
                
                if ($sentencia=$sentencia->fetch(PDO::FETCH_ASSOC)) {
                    $_SESSION['user']= $email;
                    return header('location: index.php');
                }else{
                    return $error='datos incorrectos';
                    return header('location:login.php');
                }
        }

        public function registrarusuario($usuario,$email,$pass){
       try
       {
           //$new_password = password_hash($upass, PASSWORD_DEFAULT);
            $noticia = new Db_Noticia();
            $conexion=$noticia->conn;
   
           $stmt = $conexion->prepare("INSERT INTO admin(admin_usuario,admin_email,admin_password) 
                                                       VALUES(:usuario, :email, :pass)");
              
           $stmt->bindparam(":usuario", $usuario);
           $stmt->bindparam(":email", $email);
           $stmt->bindparam(":pass", $pass);            
           $stmt->execute(); 
   
           return $stmt; 
           return 'exito';
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }

     public function eliminarusuario($usuario,$email,$pass){
       try
       {
           //$new_password = password_hash($upass, PASSWORD_DEFAULT);
            $noticia = new Db_Noticia();
            $conexion=$noticia->conn;
   
           $stmt = $conexion->prepare("INSERT INTO admin(admin_usuario,admin_email,admin_password) 
                                                       VALUES(:usuario, :email, :pass)");
              
           $stmt->bindparam(":usuario", $usuario);
           $stmt->bindparam(":email", $email);
           $stmt->bindparam(":pass", $pass);            
           $stmt->execute(); 
   
           return $stmt; 
           return 'exito';
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }

    } 