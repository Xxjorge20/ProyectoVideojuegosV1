
<?php

    /**
     * Función para dar de alta un usuario.
     *
     * @return bool Retorna true si el usuario se registra correctamente, false en caso contrario.
     */
    function altaUsuario() : bool{

        try{
            
            $escorrecto = false;
            require_once '../Modelo/Usuario.php';
            require_once '../Modelo/UsuarioBD.php';
        
            
            $nombre = $_POST['nombre'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            
            $usuarioCreado = new Usuario();
            $usuarioCreado->setNombre($nombre);
            $usuarioCreado->setUsuario($usuario);
            $usuarioCreado->setPassword($password);  
            $usuarioCreado->setEmail($email);
            
            $escorrecto = UsuarioBD::registrarUsuario($usuarioCreado);

            return $escorrecto;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

    }
    

?>