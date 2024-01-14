<?php


    function borrarCampeon($nombre) :bool {

        include_once('../Modelo/Campeon.php');
        include_once('../Modelo/CampeonBD.php');

        $campeon = CampeonBD::getCampeonPorNombre($nombre);
        $nombreCampeonBorrar = $campeon->getNombre();

        $borradoCorrectamente = CampeonBD::borrarCampeon($nombreCampeonBorrar);
        return $borradoCorrectamente;
    }

?>
