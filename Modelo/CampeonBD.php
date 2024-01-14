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

            return $insertadoCorrectamente;
        }

        /**
         * Obtiene todos los campeones de la base de datos.
         *
         * @return array Devuelve un array con todos los campeones de la base de datos.
         */

        public static function getCampeones(){

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
        }

        /**
         * Obtiene un campeón de la base de datos.
         *
         * @param String $rol mostrara todos los campeones que pertenezcan a un determinado Rol.
         * @return Campeon Devuelve un array con los campeones de ese Rol.
         */

        public static function getCampeonPorRol(String $rol){

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
        }


        /**
         * Obtiene un campeón de la base de datos.
         *
         * @param String $nombre El nombre del campeón a obtener.
         * @return Campeon Devuelve un objeto Campeon con los datos del campeón.
        */


        public static function getCampeonPorNombre(String $nombre) :Campeon{
            

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

            return $campeon;
        }


        // Modificar un campeón de la base de datos.

        /**
         * Modifica un campeón de la base de datos.
         *
         * @param Nombre nombre del campeón a modificar.
         * @return bool Devuelve true si el campeón se modificó correctamente, de lo contrario devuelve false.
         */

        public static function modificarCampeon(Campeon $campeon) :bool{

            $modificadoCorrectamente = false;

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

            return $modificadoCorrectamente;
        
        }

        /**
         * Borra un campeón de la base de datos.
         *
         * @param String $nombre El nombre del campeón a borrar.
         * @return bool Devuelve true si el campeón se borró correctamente, de lo contrario devuelve false.
         */

        public static function borrarCampeon(String $nombre) :bool{

            $borradoCorrectamente = false;

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

            return $borradoCorrectamente;
        }


    }

?>