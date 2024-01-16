<?php

    class usuarioBD{

        /**
         * Registra un nuevo usuario en la base de datos.
         *
         * @param Usuario $usuario El objeto Usuario a registrar.
         * @return bool Retorna true si el usuario se registró correctamente, de lo contrario retorna false.
         */
        public static function registrarUsuario(Usuario $usuario) : bool{

            include_once( __DIR__ . '/../Conexion/Conexion.php');
            $conexion = Conexion::conectarDB();

            try{

                $escorrecto = false;

                $nombreUsuario = $usuario->getUsuario();
                $nameUser = $usuario->getUsuario();
                $email= $usuario->getEmail();
                $password = $usuario->getPassword();
                


                $sql = "INSERT INTO usuarios (Nombre, Usuario, Contraseña, Email) VALUES (:nombre, :usuario, :pwd, :email)";
                $sentencia = $conexion->prepare($sql);
                $escorrecto = $sentencia->execute([
                    "nombre" => $nombreUsuario,
                    "usuario" => $nameUser,
                    "pwd" => password_hash($password, PASSWORD_DEFAULT),
                    "email" => $email
                ]);

                return $escorrecto;

            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }


        /**
         * Verifica si un usuario puede iniciar sesión en el sistema.
         *
         * @param string $username El nombre de usuario.
         * @param string $password La contraseña del usuario.
         * @return bool Retorna true si el usuario puede iniciar sesión, de lo contrario retorna false.
         */
        public static function logeaUsuario(string $username, string $password) : bool{

            include_once( __DIR__ . '/../Conexion/Conexion.php');
            $conexion = Conexion::conectarDB();
            $escorrecto = false;

            try{

                $sql = "SELECT * FROM usuarios WHERE Usuario = :Usuario";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute(["Usuario" => $username]);

                $usuario = $sentencia->fetch();

                if($usuario && password_verify($password, $usuario['Contraseña'])){
                    $escorrecto = true;
                    return $escorrecto;
                }else{
                    return $escorrecto;
                }

            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }

        
    }




?>
