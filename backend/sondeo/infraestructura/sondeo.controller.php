<?php

    class SondeoControllerApi {
        public function api ()
        {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'POST':
                    $var = file_get_contents("php://input");
                    $info = json_decode($var, true);

                    $objDto = new Sondeo();
                    $objDto -> setTitulo($info['titulo']);
                    $objDto -> setFechaApertura($info['fechaApertura']);
                    $objDto -> setFechaCierre($info['fechaCierre']);
                    $objDto -> setTematicaAbordada($info['tematicaAbordada']);

                    $objDao = new SondeoDao($objDto);

                    $objService = new SondeoService($objDao);

                    $objService -> add();

                    echo "Hola";
                    return;

                    if (!$objService -> add()) {
                        echo json_encode(array('status' => 404, 'result' => 'Not Found'), http_response_code(404));
                    } else {
                        echo json_encode(array('status' => 404, 'result' => 'Successfully'), http_response_code(200));
                    }

                    break;
                
            }
        }
    }

?>