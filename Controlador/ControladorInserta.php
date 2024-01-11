<?php
    include_once('../Modelo/Campeon.php');
    include_once('../Modelo/CampeonBD.php');

    $nombreCampeon = $_POST['nombre'];
    $rolCampeon = $_POST['rol'];
    $dificultadCampeon = $_POST['dificultad'];
    $descripcionCampeon = $_POST['descripcion'];

    $campeonInsertar = new Campeon();
    $campeonInsertar->setNombre($nombreCampeon);
    $campeonInsertar->setRol($rolCampeon);
    $campeonInsertar->setDificultad($dificultadCampeon);
    $campeonInsertar->setDescripcion($descripcionCampeon);

    $insertadoCorrectamente = CampeonBD::addCampeon($campeonInsertar);

    if($insertadoCorrectamente){
        echo "Campeon insertado correctamente";
        echo "<a href='../Vista/formInsertar.php'>Volver</a>";
    }else{
        echo "Error al insertar el campeon";
    }


?>