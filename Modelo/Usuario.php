<?php

    class Usuario{

        private int $Id;
        private string $Nombre;
        private string $Usuario;
        private string $Password;
        private string $Email;

        // Getters y Setters

        public function getId(): int
        {
            return $this->Id;
        }

        public function setNombre(string $nombre)
        {
            $this->Nombre = $nombre;
        }

        public function getNombre(): string
        {
            return $this->Nombre;
        }

        public function setUsuario(string $usuario)
        {
            $this->Usuario = $usuario;
        }

        public function getUsuario(): string
        {
            return $this->Usuario;
        }

        public function setPassword(string $password)
        {
            $this->Password = $password;
        }

        public function getPassword(): string
        {
            return $this->Password;
        }

        public function setEmail(string $email)
        {
            $this->Email = $email;
        }

        public function getEmail(): string
        {
            return $this->Email;
        }

        
    }


?>