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

    } 



?> 