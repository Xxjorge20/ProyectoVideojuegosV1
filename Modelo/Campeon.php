<?php

    class Campeon{

        private int $Id;
        private string $Nombre;
        private string $Rol;
        private string $Dificultad;
        private string $Descripcion;

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

        public function setRol(string $rol)
        {
            $this->Rol = $rol;
        }

        public function getRol(): string
        {
            return $this->Rol;
        }

        public function setDificultad(string $dificultad)
        {
            $this->Dificultad = $dificultad;
        }

        public function getDificultad(): string
        {
            return $this->Dificultad;
        }

        public function setDescripcion(string $descripcion)
        {
            $this->Descripcion = $descripcion;
        }

        public function getDescripcion(): string
        {
            return $this->Descripcion;
        }


        


    }





?>