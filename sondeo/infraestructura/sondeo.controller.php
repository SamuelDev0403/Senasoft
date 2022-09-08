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
                    $objDto -> setIdSexo($info['idSexo']);
                    $objDto -> setIdEtnia($info['idEtnia']);

                    $objDao = new SondeoDao($objDto);
                    $objService = new SondeoService($objDao);

                    $objService -> add();

                    if (!$objService -> add()) {
                        echo json_encode(array('status' => 404, 'result' => 'Not Found'), http_response_code(404));
                    } else {
                        echo json_encode(array('status' => 404, 'result' => 'Successfully'), http_response_code(200));
                    }

                    break;

                case 'GET':
                    $objService = new SondeoService( new SondeoDao( new Sondeo()));

                    $var = $objService -> viewAll() -> fetch();
                    $response = json_encode($var);

                    var_dump($response);

                    break;
                
            }
        }
    }

?>