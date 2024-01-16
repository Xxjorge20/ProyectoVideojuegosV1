<?php

    /**
     * Función que realiza el inicio de sesión de un usuario.
     *
     * @return bool Retorna true si el inicio de sesión es exitoso, de lo contrario retorna false.
     */
    function loginUsuario() : bool{
        try{
            $escorrecto = false;
            require_once '../Modelo/Usuario.php';
            require_once '../Modelo/UsuarioBD.php';
            
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $escorrecto = UsuarioBD::logeaUsuario($usuario, $password);


            return $escorrecto;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }





?>