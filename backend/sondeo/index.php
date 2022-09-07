<?php

    require_once 'dominio/sondeo.php';
    require_once 'dominio/sondeo.interface.php';

    require_once 'aplicacion/sondeo.service.php';

    require_once 'infraestructura/conexion.sondeo.php';
    require_once 'infraestructura/sondeo.mysql.dao.php';
    require_once 'infraestructura/sondeo.controller.php';
    require_once 'infraestructura/route.controller.sondeo.php';

    $objArranque = new RouteControllerSondeo();
    $objArranque -> run();

?>