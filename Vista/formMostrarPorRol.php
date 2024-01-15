<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Mostrar por Rol</title>
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
        <h1>Mostrar los campeones por Rol</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="Rol">Rol:</label>
            <input type="text" name="Rol" id="Rol" required>
            <input type="submit" value="Mostrar por Rol" name="mostrarPorRol">
        </form>
    </div>

    <div id="respuesta">
        <?php
                $campeones = [];

                if(isset($_POST['mostrarPorRol'])) {
                    $rol = $_POST['Rol'];
                    include_once('../Modelo/Campeon.php');
                    include_once('../Controlador/ControladorMostrarPorRol.php');
                    $campeones = mostrarPorRol($rol);
                } else {
                    $rol = "";
                }

                // Comprobar si hay campeones antes de intentar mostrar la tabla
                if (!empty($campeones) && isset($_POST['mostrarPorRol'])) {
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
                if (isset($_POST['mostrarPorRol'])) {
                    echo '<p>No hay campeones disponibles para el rol especificado.</p>';
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
