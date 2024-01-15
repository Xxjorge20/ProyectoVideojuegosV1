<?php

    
    function obtenerCampeonModificar(String $nombre) : Campeon{
        
        include_once('../Modelo/Campeon.php');
        include_once('../Modelo/CampeonBD.php');

 
        $campeon = CampeonBD::getCampeonPorNombre($nombre);
        
        return $campeon;
    }

    function modificarCampeon($nombre, $rol, $dificultad,$descripcion) :bool{


        
        include_once('../Modelo/Campeon.php');
        include_once('../Modelo/CampeonBD.php');
        $campeon = new Campeon();
        
        $campeon->setNombre($nombre);
        $campeon->setRol($rol);
        $campeon->setDificultad($dificultad);
        $campeon->setDescripcion($descripcion);

        $modificadoCorrectamente = CampeonBD::modificarCampeon($campeon);
        return $modificadoCorrectamente;
    }


    function obtenerNombres() : array{
            
            include_once('../Modelo/Campeon.php');
            include_once('../Modelo/CampeonBD.php');
            $nombres = CampeonBD::getNombresCampeones();
            return $nombres;
    }
?>