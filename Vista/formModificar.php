<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Gestion Campeon</title>
</head>
<body>
    <div id="menuPrincipal">
        <a href="formInserta.php">Insertar</a>
        <a href="formModificar.php">Modificar</a>
        <a href="formBorrar.php">Borrar</a>
        <a href="formMostrarTodos.php">Mostrar Todos</a>
        <a href="formMostrarPorRol.php">Mostrar por Rol</a>
    </div>

    <h1>Gestion Campeon - Modificar Campeon</h1>


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <input type="submit" value="Buscar campeon" name="modificarCampeon">
    </form>


    <?php
    if (isset($_POST['modificarCampeon'])) {
        include_once('../Controlador/ControladorModificar.php');
        $nombre = $_POST['nombre'];
        $campeon = obtenerCampeonModificar($nombre);
        $mostrarFormulario = false;

        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombreModificado" id="nombreModificado" value="<?php echo $campeon->getNombre(); ?>" required readonly>
            <br>
            <label for="rol">Rol:</label>
            <input type="text" name="rolModificado" id="rolModificado" value="<?php echo $campeon->getRol(); ?>" required>
            <br>
            <label for="dificultad">Dificultad:</label>
            <input type="text" name="dificultadModificado" id="dificultadModificado" value="<?php echo $campeon->getDificultad(); ?>" required>
            <br>
            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcionModificado" id="descripcionModificado" value="<?php echo $campeon->getDescripcion(); ?>" required>
            <br>

            <input type="submit" value="Modificar" name="modificarCampeonOriginal">
        </form>

        <?php
    }

    if (isset($_POST['modificarCampeonOriginal'])) {
        include_once('../Controlador/ControladorModificar.php');
        include_once('../Modelo/Campeon.php');
        echo "<h1>Campeon modificado</h1>";
        $mostrarFormulario = false;

        $nombre = $_POST['nombreModificado'];
        $rol = $_POST['rolModificado'];
        $dificultad = $_POST['dificultadModificado'];
        $descripcion = $_POST['descripcionModificado'];

        


        $modificadoCorrectamente = modificarCampeon($nombre, $rol, $dificultad, $descripcion);

        if ($modificadoCorrectamente) {
            echo "<br>";
            echo "<br>";
            echo "<h1>Campeon modificado correctamente</h1>";

            // limpiar los datos del formulario
            $_POST['nombre'] = "";
            $_POST['rol'] = "";
            $_POST['dificultad'] = "";
            $_POST['descripcion'] = "";
        } else {
            echo "<br>";
            echo "<br>";
            echo "<h1>Campeon no modificado correctamente</h1>";
        }
    }
    ?>


</body>
</html>
