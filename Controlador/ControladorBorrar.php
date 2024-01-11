<?php
    // formBorrar.php

    include_once('../Modelo/Campeon.php');
    include_once('../Modelo/CampeonBD.php');

    $nombre = $_POST['nombre'];

    $campeon = CampeonBD::getCampeonPorNombre($nombre);

    if ($campeon) {
        // Si se ha enviado el formulario de confirmación
        if (isset($_POST['confirmar'])) {
            CampeonBD::borrarCampeon($nombre);
            echo '<p>Campeon borrado correctamente.</p>';
            echo '<a href="../Vista/formBorrar.php">Volver</a>';
        } else {
            // Muestra el formulario de confirmación
            echo '<h1>Confirmar Borrado</h1>';
            echo '<p>¿Seguro que deseas borrar al campeon ' . $nombre . '?</p>';
            echo '<form action="" method="post">';
            echo '<input type="hidden" name="nombre" value="' . $nombre . '">';
            echo '<input type="submit" name="confirmar" value="Confirmar">';
            echo '<input type="submit" name="cancelar" value="Cancelar">';
            echo '</form>';
        }
    } else {
        echo '<p>No existe un campeon con ese nombre.</p>';
    }
    if (isset($_POST['cancelar'])) {
        header('Location: formBorrar.php');
        exit;
    }
?>
