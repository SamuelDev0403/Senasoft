<?php

    class UsuarioServices {
        private $usuarioRepository;

        public function __construct(UsuariosInterface $usuarioRepository)
        {
            $this -> usuarioRepository = $usuarioRepository;
        }

        public function login ($documento)
        {
            return $this -> usuarioRepository :: login($documento);
        }

        public function add ()
        {
            return $this -> usuarioRepository -> addUsuario();
        }

        public function querySexo ($idSexo)
        {
            return $this -> usuarioRepository :: getQuerySexo($idSexo);
        }

        public function queryEtnia ($idEtnia)
        {
            return $this -> usuarioRepository :: getQueryEtnia($idEtnia);
        }

        public function queryEstrato ($idEstrato)
        {
            return $this -> usuarioRepository :: getQueryEstrato($idEstrato);
        }
    }

?>