<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Todos</title>
</head>
<body>

    <div id="menuPrincipal">
        <a href="formInserta.php">Insertar</a>
        <a href="formModificar.php">Modificar</a>
        <a href="formBorrar.php">Borrar</a>
        <a href="formMostrarTodos.php">Mostrar Todos</a>
        <a href="formMostrarPorRol.php">Mostrar por Rol</a>
    </div>

    <h1>Gestion Campeon - Mostrar Todos</h1>

    <br>
    <br>

    <?php

        $campeones = [];

            include_once('../Modelo/Campeon.php');
            include_once('../Controlador/ControladorMostrarTodos.php');
            $campeones = mostrarTodos();

        // Comprobar si hay campeones antes de intentar mostrar la tabla
        if (isset($campeones)) {
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
        ?>
            <h1>No hay campeones</h1>
        <?php
            }
        ?>
           
        <?php

    ?>






</body>
</html>