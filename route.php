<?php

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

    $route = explode('/', $_SERVER['REQUEST_URI']);
    $route = array_filter($route);

    $json = array(
        'status' => 404,
        'result' => 'Not Found'
    );

    if (count($route) == 0) {
        echo json_encode($json, http_response_code($json['status']));
    }

    switch ($route[2]) {
        case 'acceso':
            require_once 'acceso/index.php';
            break;

        case 'sondeo':
            require_once 'sondeo/index.php';
            break;

        default:
            echo json_encode($json, http_response_code($json['status']));
            break;
    }
