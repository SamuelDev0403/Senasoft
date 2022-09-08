<?php

    class SondeoService {
        private $sondeoRepository;

        public function __construct (SondeoRepository $sondeoRepository)
        {
            $this -> sondeoRepository = $sondeoRepository;
        }
        
        public function add ()
        {
            return $this -> sondeoRepository -> addSondeo();
        }
        
        public function viewAll ()
        {
            return $this -> sondeoRepository :: viewAllSondeo();
        }

        public function addPregunta ($descripcionPregunta)
        {
            return $this -> sondeoRepository :: addPregunta($descripcionPregunta);
        }

        public function addRespuesta ($descripcionRespuesta)
        {
            return $this -> sondeoRepository :: addRespuesta($descripcionRespuesta);
        }
    }

?>