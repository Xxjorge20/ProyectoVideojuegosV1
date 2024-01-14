<?php
    include_once('../Modelo/Campeon.php');
    include_once('../Modelo/CampeonBD.php');

    function insertarCampeon($nombreCampeon, $rolCampeon, $dificultadCampeon, $descripcionCampeon) :bool {
        $campeonInsertar = new Campeon();
        $campeonInsertar->setNombre($nombreCampeon);
        $campeonInsertar->setRol($rolCampeon);
        $campeonInsertar->setDificultad($dificultadCampeon);
        $campeonInsertar->setDescripcion($descripcionCampeon);

        $insertadoCorrectamente = CampeonBD::addCampeon($campeonInsertar);


        
        return $insertadoCorrectamente;
    }



?>