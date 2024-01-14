<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Borrar Campeon</title>
</head>
<body>
    <div id="menuPrincipal">
        <a href="formInserta.php">Insertar</a>
        <a href="formModificar.php">Modificar</a>
        <a href="formBorrar.php">Borrar</a>
        <a href="formMostrarTodos.php">Mostrar Todos</a>
        <a href="formMostrarPorRol.php">Mostrar por Rol</a>
    </div>


    <h1>Gestion Campeon - Borrar Campeon</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <input type="submit" value="Borrar" name="borrarCampeon">
    </form>

    <?php
        if (isset($_POST['borrarCampeon'])) {
            $nombre = $_POST['nombre'];
            ?>

            <!-- Formulario de confirmación con HTML -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
                <h1>Confirmar Borrado</h1>
                <p>¿Seguro que deseas borrar al campeon <?php echo $nombre; ?>?</p>
                <input type="submit" name="confirmarBorrado" value="Confirmar">
                <input type="submit" name="cancelarBorrado" value="Cancelar">
            </form>

            <?php
        } elseif (isset($_POST['confirmarBorrado'])) {

            include_once('../Controlador/ControladorBorrar.php');
            $nombre = $_POST['nombre'];

            $borradoCorrectamente = borrarCampeon($nombre);
            if ($borradoCorrectamente) {
                echo "<br>";
                echo "<br>";
                echo "<h1>Campeon borrado correctamente</h1>";
                $_POST['nombre'] = "";
            } else {
                echo "<br>";
                echo "<br>";
                echo "<h1>Campeon no borrado correctamente</h1>";
            }
        } elseif (isset($_POST['cancelarBorrado'])) {

            echo "<br>";
            echo "<br>";
            echo "<h1>Operación de borrado cancelada por el usuario</h1>";
        }
    ?>


</body>
</html>