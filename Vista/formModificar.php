<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Gestion Campeon</title>
    <link rel="stylesheet" href="../Estilos/style.css">
    <link rel="icon" type="image/jpg" href="../Estilos/Logo.jpg">
</head>
<body>

    <div id = "cabecera">
        <div id = "logo">
            <a href="../formInserta.php"><img src="../Estilos/banner.jpg" alt="logo"></a>
        </div>

        <div id = "menu">
            <ul>
                <li><a href="formInserta.php">Insertar Campeon</a></li>
                <li><a href="formMostrarTodos.php">Consultar Campeon</a></li>
                <li><a href="formMostrarPorRol.php">Consultar por Rol</a></li>
                <li><a href="formModificar.php">Modificar Campeon</a></li>
                <li><a href="formBorrar.php">Eliminar Campeon</a></li>
            </ul>
        </div>
    </div>

    <div id = "form">
        <h1>Gestion Campeon - Modificar Campeon</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <input type="submit" value="Buscar campeon" name="modificarCampeon">
        </form>
    </div>

    <div id="respuesta">
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
    </div>


    <footer class="pie">
        <!-- Sección "Dónde estamos" -->
        <div class="footer-section">
            <h4>Dónde estamos</h4>
            <div class="map-widget">
                <p>Dirección: Reino De Luque, S/N</p>
                <p>Ciudad: Luque</p>
                <p>Código Postal: 14880</p>
            </div>
        </div>
        <!-- Sección "Contacto" -->
        <div class="footer-section">
            <h4>Contacto</h4>
            <p>Teléfono: +34 123 456 789</p>
            <p>Email: info@reinodeluque.es</p>
        </div>
    
        <!-- Sección "Redes Sociales" -->
        <div class="footer-section">
            <h4>Redes Sociales</h4>
            <div class="social-icons">
                <a href="https://dnd.wizards.com/es"><img src="../Estilos/Logo.jpg" alt="PagOficial" width="40" height="40"></a>
                <a href="https://twitter.com/MultiExt"><img src="../Estilos/MulExt.jpg" alt="Twitter" width="40" height="40"></a>
                <a href="https://www.instagram.com/dndwizards/"><img src="../Estilos/Instagram.jpg" alt="Instagram" width="40" height="40"></a>
                <a href="https://www.youtube.com/@lynxreviewer"><img src="../Estilos/Youtube.jpg" alt="YouTube" width="40" height="40"></a>
            </div>
        </div>
    
        <!-- Widget de verificación W3C -->
        <div class="footer-section">
            <h4>Verificado por W3C</h4>
            <p>
                <a href="http://jigsaw.w3.org/css-validator/check/referer">
                    <img style="border:0;width:88px;height:31px"
                        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                        alt="¡CSS Válido!" />
                    </a>
            </p>
        </div>
    </footer>


</body>
</html>
