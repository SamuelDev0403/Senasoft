<?php

    class Sondeo {
        private $idSondeo;
        private $titulo;
        private $fechaApertura;
        private $fechaCierre;
        private $tematicaAbordada;
        private $idSexo;
        private $idEtnia;
        private $idPregunta;
        private $descripcionPregunta;
        private $idRespuesta;
        private $descripcionRespuesta;

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
        public function getIdPregunta ()
        {
            return $this -> idPregunta;
        }
        public function getDescripPregunta ()
        {
            return $this -> descripcionPregunta;
        }
        public function getIdRespuesta ()
        {
            return $this -> idRespuesta;
        }
        public function getDescripRespuesta ()
        {
            return $this -> descripcionRespuesta;
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
        public function setIdPregunta ($idPregunta)
        {
            $this -> idPregunta = $idPregunta;
        }
        public function setDescripPregunta ($descripcionPregunta)
        {
            $this -> descripcionPregunta = $descripcionPregunta;
        }
        public function setIdRespuesta ($idRespuesta)
        {
            $this -> idRespuesta = $idRespuesta;
        }
        public function setDescripRespuesta ($descripcionRespuesta)
        {
            $this -> descripcionRespuesta = $descripcionRespuesta;
        }
    }

?>