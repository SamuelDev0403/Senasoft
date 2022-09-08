<?php

    interface SondeoRepository {

        public function addSondeo ();
        public static function viewAllSondeo ();
        public static function addPregunta ($descripcionPregunta);
        public static function addRespuesta ($descripcionRespuesta);

    }

?>