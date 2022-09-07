<?php

    class UsuarioServices {
        private $usuarioRepository;

        public function __construct(UsuariosInterface $usuarioRepository)
        {
            $this -> usuarioRepository = $usuarioRepository;
        }

        public function login ($documento, $contrasena)
        {
            return $this -> usuarioRepository :: login($documento, $contrasena);
        }

        public function add ()
        {
            return $this -> usuarioRepository -> addUsuario();
        }
    }

?>