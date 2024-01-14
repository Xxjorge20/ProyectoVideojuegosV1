<?php


    function mostrarPorRol($rol) : array {

        include_once('../Modelo/Campeon.php');
        include_once('../Modelo/CampeonBD.php');
    
        
        $campeones = CampeonBD::getCampeonPorRol($rol);
        return $campeones;
    }


?>