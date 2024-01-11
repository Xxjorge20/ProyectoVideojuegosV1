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

        <h1>Gestion Campeon</h1>
        <form action="../Controlador/ControladorModificar.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <input type="submit" value="Buscar campeon">
        </form>
</body>
</html>