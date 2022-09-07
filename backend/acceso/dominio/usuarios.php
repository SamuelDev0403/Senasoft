<?php

    class Usuarios {
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

        /*****************/
        /**** GETTERS ****/
        /*****************/
        public function getDocumento ()
        {
            return $this -> documento;
        }
        public function getNombre ()
        {
            return $this -> nombre;
        }
        public function getApellidos ()
        {
            return $this -> apellidos;
        }
        public function getContrasena ()
        {
            return $this -> contrasena;
        }
        public function getTelCel ()
        {
            return $this -> telCel;
        }
        public function getTelFijo ()
        {
            return $this -> telFijo;
        }
        public function getCorreo ()
        {
            return $this -> correo;
        }
        public function getDireccion ()
        {
            return $this -> direccion;
        }
        public function getFechaNa ()
        {
            return $this -> fechaNa;
        }
        public function getDiscapacidad ()
        {
            return $this -> discapacidad;
        }
        public function getAccesoDis ()
        {
            return $this -> accesoDis;
        }
        public function getConecInt ()
        {
            return $this -> conecInt;
        }
        public function getTipoReg ()
        {
            return $this -> tipoReg;
        }
        public function getMunicipio ()
        {
            return $this -> municipio;
        }
        public function getBarrioVereda ()
        {
            return $this -> barrioVereda;
        }
        public function getIdTipoDoc ()
        {
            return $this -> idTipoDoc;
        }
        public function getIdSexo ()
        {
            return $this -> idSexo;
        }
        public function getIdEtnia ()
        {
            return $this -> idEtnia;
        }
        public function getIdEstrato ()
        {
            return $this -> idEstrato;
        }
        public function getIdNivelEdu ()
        {
            return $this -> idNivelEdu;
        }
        public function getIdDispositivo ()
        {
            return $this -> idDispo;
        }

        /*****************/
        /**** SETTERS ****/
        /*****************/

        public function setDocumento ($documento)
        {
            $this -> documento = $documento;
        }
        public function setNombre ($nombre)
        {
            $this -> nombre = $nombre;
        }
        public function setApellidos ($apellidos)
        {
            $this -> apellidos = $apellidos;
        }
        public function setContrasena ($contrasena)
        {
            $this -> contrasena = $contrasena;
        }
        public function setTelCel ($telCel)
        {
            $this -> telCel = $telCel;
        }
        public function setTelFijo ($telFijo)
        {
            $this -> telFijo = $telFijo;
        }
        public function setCorreo ($correo)
        {
            $this -> correo = $correo;
        }
        public function setDireccion ($direccion)
        {
            $this -> direccion = $direccion;
        }
        public function setFechaNa ($fechaNa)
        {
            $this -> fechaNa = $fechaNa;
        }
        public function setDiscapacidad ($discapacidad)
        {
            $this -> discapacidad = $discapacidad;
        }
        public function setAccesoDis ($accesoDis)
        {
            $this -> accesoDis = $accesoDis;
        }
        public function setConecInt ($conecInt)
        {
            $this -> conecInt = $conecInt;
        }
        public function setTipoReg ($tipoReg)
        {
            $this -> tipoReg = $tipoReg;
        }
        public function setMunicipio ($municipio)
        {
            $this -> municipio = $municipio;
        }
        public function setBarrioVereda ($barrioVereda)
        {
            $this -> barrioVereda = $barrioVereda;
        }
        public function setIdTipoDoc ($idTipoDoc)
        {
            $this -> idTipoDoc = $idTipoDoc;
        }
        public function setIdSexo ($idSexo)
        {
            $this -> idSexo = $idSexo;
        }
        public function setIdEtnia ($idEtnia)
        {
            $this -> idEtnia = $idEtnia;
        }
        public function setIdEstrato ($idEstrato)
        {
            $this -> idEstrato = $idEstrato;
        }
        public function setIdNivelEdu ($idNivelEdu)
        {
            $this -> idNivelEdu = $idNivelEdu;
        }
        public function setIdDispositivo ($idDispo)
        {
            $this -> idDispo = $idDispo;
        }


    }

?>