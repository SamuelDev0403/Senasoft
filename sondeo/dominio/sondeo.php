<?php

    class Sondeo {
        private $idSondeo;
        private $titulo;
        private $fechaApertura;
        private $fechaCierre;
        private $tematicaAbordada;
        private $idSexo;
        private $idEtnia;

        /***************/
        /*** GETTERS ***/
        /***************/

        public function getIdSondeo ()
        {
            return $this -> idSondeo;
        }
        public function getTitulo ()
        {
            return $this -> titulo;
        }
        public function getFechaApertura ()
        {
            return $this -> fechaApertura;
        }
        public function getFechaCierre ()
        {
            return $this -> fechaCierre;
        }
        public function getTematicaAbordada ()
        {
            return $this -> tematicaAbordada;
        }
        public function getIdSexo ()
        {
            return $this -> idSexo;
        }
        public function getIdEtnia ()
        {
            return $this -> idEtnia;
        }
        
        /***************/
        /*** SETTERS ***/
        /***************/

        public function setIdSondeo ($idSondeo)
        {
            $this -> idSondeo = $idSondeo;
        }
        public function setTitulo ($titulo)
        {
            $this -> titulo = $titulo;
        }
        public function setFechaApertura ($fechaApertura)
        {
            $this -> fechaApertura = $fechaApertura;
        }
        public function setFechaCierre ($fechaCierre)
        {
            $this -> fechaCierre = $fechaCierre;
        }
        public function setTematicaAbordada ($tematicaAbordada)
        {
            $this -> tematicaAbordada = $tematicaAbordada;
        }
        public function setIdSexo ($idSexo)
        {
            $this -> idSexo = $idSexo;
        }
        public function setIdEtnia ($idEtnia)
        {
            $this -> idEtnia = $idEtnia;
        }
    }

?>