<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Inserta Campeon</title>
</head>
<body>
    <div id="menuPrincipal">
        <a href="formInserta.php">Insertar</a>
        <a href="formModificar.php">Modificar</a>
        <a href="formBorrar.php">Borrar</a>
        <a href="formMostrarTodos.php">Mostrar Todos</a>
        <a href="formMostrarPorRol.php">Mostrar por Rol</a>
    </div>


    <h1>Gestion Campeon - Insertar Campeon</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="rol">Rol</label>
        <input type="text" name="rol" id="rol" required>
        <br>
        <label for="dificultad">Dificultad</label>
        <input type="text" name="dificultad" id="dificultad" required>
        <br>
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" id="descripcion" required>
        <br>
        <input type="submit" value="Insertar" name="insertarCampeon">
    </form>



    <?php
        include_once('../Controlador/ControladorInserta.php');
        
        if(isset($_POST['insertarCampeon'])) {

            $nombre = $_POST['nombre'];
            $rol = $_POST['rol'];
            $dificultad = $_POST['dificultad'];
            $descripcion = $_POST['descripcion'];

            $insertadoCorrectamente = insertarCampeon($nombre, $rol, $dificultad, $descripcion);

            if($insertadoCorrectamente && isset($_POST['insertarCampeon'])) {

                echo "<br>";
                echo "<br>";
                echo "<h1>Campeon insertado correctamente</h1>";
    
                // limpiar los datos del formulario
                $_POST['nombre'] = "";
                $_POST['rol'] = "";
                $_POST['dificultad'] = "";
                $_POST['descripcion'] = "";
                
            } else {
                echo "<h1>Campeon no insertado</h1>";
            }
        }

    ?>

</body>
</html>