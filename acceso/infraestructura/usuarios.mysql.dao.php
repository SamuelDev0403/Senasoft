<?php

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
                $stmt -> bidnParam(1, $this -> documento, PDO::PARAM_INT);
                $stmt -> bidnParam(2, $this -> nombre, PDO::PARAM_STR);
                $stmt -> bidnParam(3, $this -> apellidos, PDO::PARAM_STR);
                $stmt -> bidnParam(4, $this -> contrasena, PDO::PARAM_STR);
                $stmt -> bidnParam(5, $this -> telCel, PDO::PARAM_INT);
                $stmt -> bidnParam(6, $this -> telFijo, PDO::PARAM_INT);
                $stmt -> bidnParam(7, $this -> correo, PDO::PARAM_STR);
                $stmt -> bidnParam(8, $this -> direccion, PDO::PARAM_STR);
                $stmt -> bidnParam(9, $this -> fechaNa, PDO::PARAM_STR);
                $stmt -> bidnParam(10, $this -> discapacidad, PDO::PARAM_STR);
                $stmt -> bidnParam(11, $this -> accesoDis, PDO::PARAM_BOOL);
                $stmt -> bidnParam(12, $this -> conecInt, PDO::PARAM_BOOL);
                $stmt -> bidnParam(13, $this -> tipoReg, PDO::PARAM_BOOL);
                $stmt -> bidnParam(14, $this -> municipio, PDO::PARAM_STR);
                $stmt -> bidnParam(15, $this -> barrioVereda, PDO::PARAM_STR);
                $stmt -> bidnParam(16, $this -> idTipoDoc, PDO::PARAM_INT);
                $stmt -> bidnParam(17, $this -> idSexo, PDO::PARAM_INT);
                $stmt -> bidnParam(18, $this -> idEtnia, PDO::PARAM_INT);
                $stmt -> bidnParam(19, $this -> idEstrato, PDO::PARAM_INT);
                $stmt -> bidnParam(20, $this -> idNivelEdu, PDO::PARAM_INT);
                $stmt -> bidnParam(21, $this -> idDispo, PDO::PARAM_INT);
                $stmt -> execute();
                $estado = $stmt;

            } catch (PDOException $e) {
                echo "Error en el dao";
            }
            return $estado;
        }

    }



?>