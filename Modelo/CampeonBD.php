<?php

    
    include_once('../Modelo/Campeon.php');
    
    class CampeonBD{

        /**
         * Añade un campeón a la base de datos.
         *
         * @param Campeon $campeon El campeón a añadir.
         * @return bool Devuelve true si el campeón se añadió correctamente, de lo contrario devuelve false.
         */
        public static function addCampeon(Campeon $campeon) :bool{

            $insertadoCorrectamente = false;

            try{
                // Establecer conexión con la base de datos
                include_once('../Conexion/Conexion.php');
                $conexion = Conexion::conectarDB();

                // Preparar la consulta
                $sql = "INSERT INTO campeon (Nombre, Rol, Dificultad, Descripcion) VALUES (:Nombre, :Rol, :Dificultad, :Descripcion)";
                $sentencia = $conexion->prepare($sql);

                $nombre = $campeon->getNombre();
                $rol = $campeon->getRol();
                $dificultad = $campeon->getDificultad();
                $descripcion = $campeon->getDescripcion();

                
                // Asignar los valores a los parámetros
                $sentencia->bindParam(':Nombre',$nombre);
                $sentencia->bindParam(':Rol', $rol);
                $sentencia->bindParam(':Dificultad', $dificultad);
                $sentencia->bindParam(':Descripcion', $descripcion);

                // Ejecutar la consulta
                $insertadoCorrectamente = $sentencia->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

            return $insertadoCorrectamente;
        }

        /**
         * Obtiene todos los campeones de la base de datos.
         *
         * @return array Devuelve un array con todos los campeones de la base de datos.
         */

        public static function getCampeones(){

            try{
                // Establecer conexión con la base de datos
                include_once('../Conexion/Conexion.php');
                $conexion = Conexion::conectarDB();

                // Preparar la consulta
                $sql = "SELECT * FROM campeon";
                $sentencia = $conexion->prepare($sql);
            
                // Ejecutar la consulta
                $sentencia->setFetchMode(PDO::FETCH_CLASS, "Campeon");
                $sentencia->execute();

                // Obtener los resultados

                return $sentencia->fetchAll();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }



        /**
         * Obtiene todos los campeones que pertenecen a un rol específico.
         *
         * @param string $rol El rol de los campeones a buscar.
         * @return array|false Un array con los campeones encontrados o false si ocurre un error.
         */

        public static function getCampeonPorRol(String $rol){

            try{
                // Establecer conexión con la base de datos
                include_once('../Conexion/Conexion.php');
                $conexion = Conexion::conectarDB();

                // Preparar la consulta
                $sql = "SELECT * FROM campeon WHERE Rol = :Rol";
                $sentencia = $conexion->prepare($sql);
            
                // Ejecutar la consulta
                $sentencia->setFetchMode(PDO::FETCH_CLASS, "Campeon");
                $sentencia->bindParam(':Rol', $rol);
                $sentencia->execute();

                // Obtener los resultados
                return $sentencia->fetchAll();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

            
        }



        /**
         * Obtiene un campeón por su nombre.
         *
         * @param string $nombre El nombre del campeón a buscar.
         * @return Campeon El objeto Campeon correspondiente al nombre especificado.
         */
        public static function getCampeonPorNombre(String $nombre) :Campeon{
            
            try{
                // Establecer conexión con la base de datos
                include_once('../Conexion/Conexion.php');
                $conexion = Conexion::conectarDB();

                // Preparar la consulta
                $sql = "SELECT * FROM campeon WHERE Nombre = :Nombre";
                $sentencia = $conexion->prepare($sql);
            
                // Ejecutar la consulta
                $sentencia->setFetchMode(PDO::FETCH_CLASS, "Campeon");
                $sentencia->bindParam(':Nombre', $nombre);
                $sentencia->execute();

                // Obtener los resultados

                $campeon = $sentencia->fetch();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

            return $campeon;
        }

        /**
         * Modifica un campeón en la base de datos.
         *
         * @param Campeon $campeon El campeón a modificar.
         * @return bool Devuelve true si el campeón se modificó correctamente, de lo contrario devuelve false.
         */
        public static function modificarCampeon(Campeon $campeon) :bool{

            $modificadoCorrectamente = false;

            try{

                // Establecer conexión con la base de datos
                include_once('../Conexion/Conexion.php');
                $conexion = Conexion::conectarDB();

                // Preparar la consulta
                $sql = "UPDATE campeon SET Nombre = :Nombre, Rol = :Rol, Dificultad = :Dificultad, Descripcion = :Descripcion WHERE Nombre = :Nombre";
                $sentencia = $conexion->prepare($sql);

                $nombre = $campeon->getNombre();
                $rol = $campeon->getRol();
                $dificultad = $campeon->getDificultad();
                $descripcion = $campeon->getDescripcion();


                // Asignar los valores a los parámetros
                $sentencia->bindParam(':Nombre',$nombre);
                $sentencia->bindParam(':Rol', $rol);
                $sentencia->bindParam(':Dificultad', $dificultad);
                $sentencia->bindParam(':Descripcion', $descripcion);

                // Ejecutar la consulta
                $modificadoCorrectamente = $sentencia->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

            return $modificadoCorrectamente;
        
        }

        /**
         * Borra un campeón de la base de datos.
         *
         * @param string $nombre El nombre del campeón a borrar.
         * @return bool Devuelve true si el campeón se borró correctamente, de lo contrario devuelve false.
         */

        public static function borrarCampeon(String $nombre) :bool{
            $borradoCorrectamente = false;
            
            try{
                
                // Establecer conexión con la base de datos
                include_once('../Conexion/Conexion.php');
                $conexion = Conexion::conectarDB();
    
                // Preparar la consulta
                $sql = "DELETE FROM campeon WHERE Nombre = :Nombre";
                $sentencia = $conexion->prepare($sql);
    
                // Asignar los valores a los parámetros
                $sentencia->bindParam(':Nombre',$nombre);
    
                // Ejecutar la consulta
                $borradoCorrectamente = $sentencia->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }


            return $borradoCorrectamente;
        }

        
        
        // Obtener un array de strings con el nombre de los roles de los campeones
        public static function getRoles()
        {
            try {
                // Establecer conexión con la base de datos
                include_once('../Conexion/Conexion.php');
                $conexion = Conexion::conectarDB();
        
                // Preparar la consulta
                $sql = "SELECT DISTINCT Rol FROM campeon";
                $sentencia = $conexion->prepare($sql);
        
                // Ejecutar la consulta
                $sentencia->execute();
        
                // Obtener los resultados
                $resultados = $sentencia->fetchAll(PDO::FETCH_COLUMN, 0);
        
                // Cerrar la conexión
                $conexion = null;
        
                // Convertir a array de strings con el nombre del rol
                $rolesArray = array();
                foreach ($resultados as $rol) {
                    $rolesArray[] = $rol;
                }
        
                return $rolesArray;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return array(); // Devuelve un array vacío en caso de error
            }
        }
        
        // Obtener un array de strings con el nombre los campeones
        public static function getNombresCampeones()
        {
            try {
                // Establecer conexión con la base de datos
                include_once('../Conexion/Conexion.php');
                $conexion = Conexion::conectarDB();
        
                // Preparar la consulta
                $sql = "SELECT Nombre FROM campeon";
                $sentencia = $conexion->prepare($sql);
        
                // Ejecutar la consulta
                $sentencia->execute();
        
                // Obtener los resultados
                $resultados = $sentencia->fetchAll(PDO::FETCH_COLUMN, 0);
        
                // Cerrar la conexión
                $conexion = null;
        
                // Convertir a array de strings con el nombre del campeón
                $nombresCampeonesArray = array();
                foreach ($resultados as $nombreCampeon) {
                    $nombresCampeonesArray[] = $nombreCampeon;
                }
        
                return $nombresCampeonesArray;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return array(); // Devuelve un array vacío en caso de error
            }
        }

        
    }

?>