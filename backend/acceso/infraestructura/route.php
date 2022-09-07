<?php

    $route = explode('/', $_SERVER['REQUEST_URI']);
    $route = array_filter($route);

    $json = array(
        'status' => 400,
        'result' => 'Not Found'
    );

    if (count($route) == 0) {
        echo json_encode($json, http_response_code($json['status']));
    }

    // $route = explode('?', $route[1])[0];
    
    switch ($route[3]) {
        case 'acceso':
            $obj = new ApiUsuariosController();
            $obj -> api();
            break;
        
        default:
            echo json_encode($json, http_response_code($json['status']));  
            break;
    }

?>