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


    <h1>Formulario Inserta Campeon</h1>
    <form action="../Controlador/ControladorInserta.php" method="POST">
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
        <input type="submit" value="Insertar">
    </form>
</body>
</html>