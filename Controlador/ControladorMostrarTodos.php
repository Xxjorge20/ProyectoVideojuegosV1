<?php

    function mostrarTodos() : array {
        include_once('../Modelo/Campeon.php');
        include_once('../Modelo/CampeonBD.php');

        $campeones = CampeonBD::getCampeones();
        return $campeones;
    }
?>


