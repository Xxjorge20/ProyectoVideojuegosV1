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

        <h1>Mostrar por Rol</h1>
        <form action="../Controlador/ControladorMostrarPorRol.php" method="POST">
            <label for="Rol">Rol:</label>
            <input type="text" name="Rol" id="Rol" require>
            <input type="submit" value="Mostrar por Rol">
        </form>
</body>
</html>