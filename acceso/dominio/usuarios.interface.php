<?php

    interface UsuariosInterface {

        public static function login($documento);
        public function addUsuario ();
        public static function getQuerySexo ($idSexo);
        public static function getQueryEtnia($idEtnia);
        public static function getQueryEstrato ($idEstrato);

    }

?>