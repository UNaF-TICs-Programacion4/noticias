
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
   
           $stmt = $conexion->prepare("delete from admin where admin_usuario=:usuario or admin_email=:email and admin_password=:pass");
              
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

    public function seleccionar_usuario($usuario,$email,$pass){
       try
       {
         $noticia = new Db_Noticia();
         $conexion=$noticia->conn;
         $stmt = $conexion->prepare("SELECT * FROM admin WHERE admin_usuario=:usuario OR admin_email=:email and admin_password=:pass");
         $stmt->execute(array(':usuario'=>$usuario, ':email'=>$email, ':pass'=>$pass));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
   
           return $row; 
           return 'exito';
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }

    public function modificar_usuario( $usuario, $pass){
            $noticia= new Db_Noticia();
            $conexion= $noticia->conn;
            $sql="update admin set admin_password= :pass where admin_usuario= :usuario";
            $sentencia= $conexion->prepare($sql);
            $sentencia->bindparam(':pass', $pass);
            $sentencia->bindparam(':usuario', $usuario);
            if (!$sentencia){
                return "error al modificar el registro";
            }else{
                $sentencia->execute();
                return "Registro modificado correctamente";
            }
 

        }


    } 