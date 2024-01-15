<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Borrar Campeon</title>
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

    <?php
        include_once('../Modelo/Campeon.php');
        include_once('../Controlador/ControladorBorrar.php');
        $nombres = obtenerNombres();
    ?>

    <div id = "form">
        <h1>Gestion Campeon - Borrar Campeon</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="nombre">Nombre</label>
            <select name="nombre" id="nombre">
                <?php
                    foreach ($nombres as $nombre => $valor) {
                        if (is_array($valor)) {
                            // Si $valor es un array, puedes manejarlo de la manera que prefieras, por ejemplo, puedes convertirlo a una cadena
                            $valor = implode(', ', $valor);
                        }
                       // echo $rol . " " . $valor . "<br>";
                        echo '<option value="' . $valor . '">' . $valor . '</option>';
                    }
                ?>
            </select>
            <br>
            <input type="submit" value="Borrar" name="borrarCampeon">
        </form>
    </div>

    <div id="respuesta">
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