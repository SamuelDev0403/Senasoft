<?php

    class SondeoControllerApi {
        public function api ()
        {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'POST':
                    $var = file_get_contents("php://input");
                    $info = json_decode($var, true);

                    // var_dump($info);

                    $objDto = new Sondeo();
                    $objDto -> setTitulo($info['titulo']);
                    $objDto -> setFechaApertura($info['fechaApertura']);
                    $objDto -> setFechaCierre($info['fechaCierre']);
                    $objDto -> setTematicaAbordada($info['tematicaAbordada']);
                    $objDto -> setIdSexo($info['idSexo']);
                    $objDto -> setIdEtnia($info['idEtnia']);
                    $objDto -> setDescripPregunta($info['idEtnia']);


                    $objDao = new SondeoDao($objDto);
                    $objService = new SondeoService($objDao);
                    $objService -> add();


                    foreach ($info['questions'] as $key => $value) {
                        $objService -> addPregunta($value["pregunta"]);
                        foreach ($value["respuestas"] as $key => $value2) {
                            $objService -> addRespuesta($value2);
                        }
                    }
                    

                    $resultado = true;

                    if ($resultado) {
                        echo json_encode(array('status' => 200, 'result' => 'Success'), http_response_code(200));
                    } else {
                        echo json_encode(array('status' => 404, 'result' => 'Not found'), http_response_code(404));
                    }

                    break;
                
            }
        }
    }

?>