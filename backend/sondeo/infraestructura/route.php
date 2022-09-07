<?php

    $route = explode('/', $_SERVER['REQUEST_URI']);
    $route = array_filter($route);

    $json = array(
        'status' => 404,
        'result' => 'Not Found'
    );

    if (count($route) == 0) {
        echo json_encode($json, http_response_code($json['status']));
    }

    switch ($route[3]) {
        case 'sondeo':
            $obj = new SondeoControllerApi();
            $obj -> api();
            break;
        
        default:
            echo json_encode($json, http_response_code($json['status']));
            break;
    }

?>