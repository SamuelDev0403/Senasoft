<?php

    class ConexionSondeo {
        private $drive;
        private $host;
        private $db;
        private $user;
        private $pass;
        private $charSet;

        public function __construct ()
        {
            $this -> drive = "mysql";
            $this -> host = "localhost";
            $this -> db = "db_desarrollo";
            $this -> user = "root";
            $this -> pass = "";
            $this -> charSet = "UTF8";
        }

        public function getConexion ()
        {
            $cadena = $this -> drive . ":host=" . $this -> host . ";dbname=" . $this -> db;
            try {
                $con = new PDO($cadena, $this -> user, $this -> pass);

                echo "Conexion exitosa";
            } catch (PDOException $e) {
                echo "Error en la conexion a la base de datos";
            }
            return $con;
        }
    }

?>