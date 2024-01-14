<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Mostrar por Rol</title>
</head>
<body>

    <div id="menuPrincipal">
        <a href="formInserta.php">Insertar</a>
        <a href="formModificar.php">Modificar</a>
        <a href="formBorrar.php">Borrar</a>
        <a href="formMostrarTodos.php">Mostrar Todos</a>
        <a href="formMostrarPorRol.php">Mostrar por Rol</a>
    </div>

    <br>
    <br>

    <?php

        $campeones = [];

        if(isset($_POST['mostrarPorRol'])) {
            $rol = $_POST['Rol'];
            include_once('../Modelo/Campeon.php');
            include_once('../Controlador/ControladorMostrarPorRol.php');
            $campeones = mostrarPorRol($rol);
        } else {
            $rol = "";
        }

        // Comprobar si hay campeones antes de intentar mostrar la tabla
        if (!empty($campeones) && isset($_POST['mostrarPorRol'])) {
    ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Dificultad</th>
                    <th>Descripción</th>
                </tr>
                <?php
                foreach ($campeones as $campeon) {
                ?>
                    <tr>
                        <td><?php echo $campeon->getId(); ?></td>
                        <td><?php echo $campeon->getNombre(); ?></td>
                        <td><?php echo $campeon->getRol(); ?></td>
                        <td><?php echo $campeon->getDificultad(); ?></td>
                        <td><?php echo $campeon->getDescripcion(); ?></td>
                    </tr>
                <?php
                }
                ?>
        </table>
    <?php
    } else {
        if (isset($_POST['mostrarPorRol'])) {
            echo '<p>No hay campeones disponibles para el rol especificado.</p>';
        }
    }
    ?>

    <h1>Mostrar los campeones por Rol</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="Rol">Rol:</label>
        <input type="text" name="Rol" id="Rol" required>
        <input type="submit" value="Mostrar por Rol" name="mostrarPorRol">
    </form>

</body>
</html>
