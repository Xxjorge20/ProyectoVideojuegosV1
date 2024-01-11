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

    <h1>Mostrar Todos</h1>
    <form action="../Controlador/ControladorMostrarTodos.php" method="POST">
        <input type="submit" value="Mostrar Todos" >
    </form>


</body>
</html>