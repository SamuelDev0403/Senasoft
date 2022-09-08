<?php

    require_once 'acceso/dominio/usuarios.php';
    require_once 'acceso/dominio/usuarios.interface.php';

    require_once 'acceso/aplicacion/usuarios.services.php';

    require_once 'acceso/infraestructura/conexion.usuarios.php';
    require_once 'acceso/infraestructura/usuarios.mysql.dao.php';
    require_once 'acceso/infraestructura/usuarios.controller.php';
    require_once 'acceso/infraestructura/route.controller.usuario.php';

    require_once 'php-jwt-main/src/JWT.php';
    require_once 'php-jwt-main/src/Key.php';

    $objArranque = new RouteControllerUsuario();
    $objArranque -> run();

?>