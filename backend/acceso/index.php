<?php

    require_once 'dominio/usuarios.php';
    require_once 'dominio/usuarios.interface.php';

    require_once 'aplicacion/usuarios.services.php';

    require_once 'infraestructura/conexion.usuarios.php';
    require_once 'infraestructura/usuarios.mysql.dao.php';
    require_once 'infraestructura/usuarios.controller.php';
    require_once 'infraestructura/route.controller.usuario.php';

    require_once '../php-jwt-main/src/JWT.php';
    require_once '../php-jwt-main/src/Key.php';

    $objArranque = new RouteControllerUsuario();
    $objArranque -> run();

?>