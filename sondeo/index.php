<?php

    require_once 'sondeo/dominio/sondeo.php';
    require_once 'sondeo/dominio/sondeo.interface.php';

    require_once 'sondeo/aplicacion/sondeo.service.php';

    require_once 'sondeo/infraestructura/conexion.sondeo.php';
    require_once 'sondeo/infraestructura/sondeo.mysql.dao.php';
    require_once 'sondeo/infraestructura/sondeo.controller.php';
    require_once 'sondeo/infraestructura/route.controller.sondeo.php';

    $objArranque = new RouteControllerSondeo();
    $objArranque -> run();

?>