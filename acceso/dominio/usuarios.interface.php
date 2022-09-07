<?php

    interface UsuariosInterface {

        public static function login($documento, $contrasena);
        public function addUsuario ();
        public static function getQuerySexo ($idSexo);
        public static function getQueryEtnia($idEtnia);
        public static function getQueryEstrato ($idEstrato);

    }

?>