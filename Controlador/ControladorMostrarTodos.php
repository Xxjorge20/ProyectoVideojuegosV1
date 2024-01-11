<?php
        include_once('../Modelo/Campeon.php');
        include_once('../Modelo/CampeonBD.php');

        $campeones = CampeonBD::getCampeones();

        // Comprobar si hay campeones antes de intentar mostrar la tabla
        if ($campeones) {
            echo '<table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Dificultad</th>
                        <th>Descripción</th>
                    </tr>';

            foreach ($campeones as $campeon) {
                echo '<tr>
                        <td>' . $campeon->getId() . '</td>
                        <td>' . $campeon->getNombre() . '</td>
                        <td>' . $campeon->getRol() . '</td>
                        <td>' . $campeon->getDificultad() . '</td>
                        <td>' . $campeon->getDescripcion() . '</td>
                    </tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No hay campeones disponibles.</p>';
        }
?>


