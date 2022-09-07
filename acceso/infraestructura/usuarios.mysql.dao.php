<?php

    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    class UsuariosDao implements UsuariosInterface {
        private $documento;
        private $nombre;
        private $apellidos;
        private $contrasena;
        private $telCel;
        private $telFijo;
        private $correo;
        private $direccion;
        private $fechaNa;
        private $discapacidad;
        private $accesoDis;
        private $conecInt;
        private $tipoReg;
        private $municipio;
        private $barrioVereda;
        private $idTipoDoc;
        private $idSexo;
        private $idEtnia;
        private $idEstrato;
        private $idNivelEdu;
        private $idDispo;

        public function __construct ($objDtoUsuarios)
        {
            $this -> documento = $objDtoUsuarios -> getDocumento();
            $this -> nombre = $objDtoUsuarios -> getNombre();
            $this -> apellidos = $objDtoUsuarios -> getApellidos();
            $this -> contrasena = $objDtoUsuarios -> getContrasena();
            $this -> telCel = $objDtoUsuarios -> getTelCel();
            $this -> telFijo = $objDtoUsuarios -> getTelFijo();
            $this -> correo = $objDtoUsuarios -> getCorreo();
            $this -> direccion = $objDtoUsuarios -> getDireccion();
            $this -> fechaNa = $objDtoUsuarios -> getFechaNa();
            $this -> discapacidad = $objDtoUsuarios -> getDiscapacidad();
            $this -> accesoDis = $objDtoUsuarios -> getAccesoDis();
            $this -> conecInt = $objDtoUsuarios ->  getConecInt();
            $this -> tipoReg = $objDtoUsuarios ->  getTipoReg();
            $this -> municipio = $objDtoUsuarios -> getMunicipio();
            $this -> barrioVereda = $objDtoUsuarios -> getBarrioVereda();
            $this -> idTipoDoc = $objDtoUsuarios -> getIdTipoDoc();
            $this -> idSexo = $objDtoUsuarios -> getIdSexo();
            $this -> idEtnia = $objDtoUsuarios -> getIdEtnia(); 
            $this -> idEstrato = $objDtoUsuarios -> getIdEstrato(); 
            $this -> idNivelEdu = $objDtoUsuarios -> getIdNivelEdu();
            $this -> idDispo = $objDtoUsuarios -> getIdDispositivo(); 
        }

        public static function login($documento, $contrasena)
        {
            $estado = false;
            $sql = "CALL spQueryLogin(?,?)";

            try {
                $con = new ConexionUsuarios();
                $stmt = $con -> getConexion() -> prepare($sql);
                $stmt -> bindParam(1, $documento, PDO::PARAM_INT);
                $stmt -> bindParam(2, $contrasena, PDO::PARAM_STR);
                $stmt -> execute();
                
                $time = time();
                $time = (60 * 30);
                $key = "*adljkfdjdñasloaspsas*/$";
                $payload = array(
                    "iat" => $time,
                    "data" => array(
                        "documento" => $documento
                    )
                );

                $jwt = JWT::encode($payload, $key, 'HS256');
                setcookie('cookiesenasoft', $jwt);

                // var_dump($jwt);
                
                $estado = $stmt;
            } catch (PDOException $e) {
                echo "Error en el dao";
            }
            return $estado;
        }

        public function addUsuario ()
        {
            $estado = false;
            $sql = "CALL spAddCiudadano(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            try {
                $con = new ConexionUsuarios();
                $stmt = $con -> getConexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> documento, PDO::PARAM_INT);
                $stmt -> bindParam(2, $this -> nombre, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> apellidos, PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> contrasena, PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> telCel, PDO::PARAM_INT);
                $stmt -> bindParam(6, $this -> telFijo, PDO::PARAM_INT);
                $stmt -> bindParam(7, $this -> correo, PDO::PARAM_STR);
                $stmt -> bindParam(8, $this -> direccion, PDO::PARAM_STR);
                $stmt -> bindParam(9, $this -> fechaNa, PDO::PARAM_STR);
                $stmt -> bindParam(10, $this -> discapacidad, PDO::PARAM_STR);
                $stmt -> bindParam(11, $this -> accesoDis, PDO::PARAM_BOOL);
                $stmt -> bindParam(12, $this -> conecInt, PDO::PARAM_BOOL);
                $stmt -> bindParam(13, $this -> tipoReg, PDO::PARAM_BOOL);
                $stmt -> bindParam(14, $this -> municipio, PDO::PARAM_STR);
                $stmt -> bindParam(15, $this -> barrioVereda, PDO::PARAM_STR);
                $stmt -> bindParam(16, $this -> idTipoDoc, PDO::PARAM_INT);
                $stmt -> bindParam(17, $this -> idSexo, PDO::PARAM_INT);
                $stmt -> bindParam(18, $this -> idEtnia, PDO::PARAM_INT);
                $stmt -> bindParam(19, $this -> idEstrato, PDO::PARAM_INT);
                $stmt -> bindParam(20, $this -> idNivelEdu, PDO::PARAM_INT);
                $stmt -> bindParam(21, $this -> idDispo, PDO::PARAM_INT);
                $stmt -> execute();
                $estado = $stmt;

            } catch (PDOException $e) {
                echo "Error en el dao " . $e -> getMessage();;
            }
            return $estado;
        }

        public static function getQuerySexo($idSexo)
        {
            $estado = false;
            $sql = "CALL spQuerySexo(?)";

            try {
                $con = new ConexionUsuarios();
                $stmt = $con -> getConexion() -> prepare($sql);
                $stmt -> bindParam(1, $idSexo, PDO::PARAM_INT);
                $stmt -> execute();
                $estado = $stmt;

            } catch (PDOException $e) {
                echo "Error en el dao";
            }
            return $estado;
        }

        public static function getQueryEtnia($idEtnia)
        {
            $estado = false;
            $sql = "CALL spQueryEtnia(?)";

            try {
                $con = new ConexionUsuarios();
                $stmt = $con -> getConexion() -> prepare($sql);
                $stmt -> bindParam(1, $idEtnia, PDO::PARAM_INT);
                $stmt -> execute();
                $estado = $stmt;

            } catch (PDOException $e) {
                echo "Error en el dao";
            }
            return $estado;
        }

        public static function getQueryEstrato ($idEstrato)
        {
            $estado = false;
            $sql = "CALL spQueryEstrato(?)";

            try {
                $con = new ConexionUsuarios();
                $stmt = $con -> getConexion() -> prepare($sql);
                $stmt -> bindParam(1, $idEstrato, PDO::PARAM_INT);
                $stmt -> execute();
                $estado = $stmt;

            } catch (PDOException $e) {
                echo "Error en el dao";
            }
            return $estado;
        }

    }


?>