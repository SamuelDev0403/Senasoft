<?php

    // require_once '../dominio/usuarios.php';
    // require_once '../dominio/usuarios.interface.php';
    // require_once 'conexion.usuarios.php';
    // require_once 'usuarios.mysql.dao.php';

    class ApiUsuariosController {

        public function api ()
        {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'POST':

                    $route = explode('/', $_SERVER['REQUEST_URI']);
                    $route = array_filter($route);

                    $json = array(
                        'status' => 400,
                        'result' => 'Not Found'
                    );

                    if (count($route) == 0) {
                        echo json_encode($json, http_response_code($json['status']));
                    }
    
                    switch ($route[4]) {
                        case 'login':
                                
                            try {
        
                                $var = file_get_contents("php://input");
                                $info = json_decode($var, true);
        
                                $objDto = new Usuarios();
                                $objDao = new UsuariosDao($objDto);
                                $objService = new UsuarioServices($objDao);



                                // $varPass = password_verify($info['contrasena'], );

                                // $resultado = $objService -> login($info['documento'], $info['contrasena']);
                                // // $resultado = $objService -> login("1025640977", "1234");
                
                
                                // if ($resultado -> fetch() === false){
                                //     echo json_encode(array("status"=> '404', "result"=>"Not found"), http_response_code(404));
                                // }else {
                                //     echo json_encode(array("status"=> '200', "result"=>"Success"), http_response_code(200));
                                // }


                                $resultado = $objService->login($info['documento']);
                                $resultado = $resultado->fetch();

                                // echo $resultado['contrasena'];

                                if (password_verify($info['contrasena'], $resultado['contrasena'])){
                                    $time = time();
                                    $time = (60 * 30);
                                    $key = "*adljkfdjdñasloaspsas*/$";
                                    $payload = array(
                                        "iat" => $time,
                                        "data" => array(
                                            "documento" => $documento
                                        )
                                    );

                                    $jwt = JWT::encode($payload, $key, 'HS256');
                                    setcookie('cookiesenasoft', $jwt);
                                    echo json_encode(array("status"=> '200', "result"=>"Success"), http_response_code(200));
                                } else {
                                    echo json_encode(array("status"=> '404', "result"=>"Not found"), http_response_code(404));
                                }
                            } catch (Exception $e) {
                                echo "Error en el controlador " . $e -> getMessage();
                            }
                
                            break;

                        case 'registro':
                            
                            try {
                                $var = file_get_contents("php://input");
    
                                $info = json_decode($var, true);
    
                                //  echo($info['documento']);
    
                                $objDto = new Usuarios();
                                $objDto -> setDocumento($info['documento']);
                                $objDto -> setNombre($info['nameInput']);
                                $objDto -> setApellidos($info['lastNameInput']);
                                $objDto -> setContrasena($info['passwordInput']);
                                $objDto -> setTelCel($info['celInput']);
                                $objDto -> setTelFijo($info['telInput']);
                                $objDto -> setCorreo($info['emailInput']);
                                $objDto -> setDireccion($info['addressInput']);
                                $objDto -> setFechaNa($info['birthdateInput']);
                                $objDto -> setDiscapacidad($info['disabilityInput']);
                                $objDto -> setAccesoDis($info['accessInput']);
                                $objDto -> setConecInt($info['connectivityInput']);
                                $objDto -> setTipoReg($info['regimeInput']);
                                $objDto -> setMunicipio($info['municipalityInput']);
                                $objDto -> setBarrioVereda($info['neighborhoodInput']);
                                $objDto -> setIdTipoDoc($info['dniType']);
                                $objDto -> setIdSexo($info['sexInput']);
                                $objDto -> setIdEtnia($info['ethnicityInput']);
                                $objDto -> setIdEstrato($info['stratumInput']);
                                $objDto -> setIdNivelEdu($info['levelInput']);
                                $objDto -> setIdDispositivo($info['devicesInput']);
    
                                $objDao = new UsuariosDao($objDto);
                                $objService = new UsuarioServices($objDao);
    
                                // $objService -> add();

                                if ($objService -> add()) {
                                    echo json_encode(array("status"=> '200', "result"=>"Success"), http_response_code(200));
                                } else {
                                    echo json_encode(array("status"=> '404', "result"=>"Not found"), http_response_code(404));
                                }
    
                            } catch (Exception $e) {
                                echo "Error en el controlador " . $e -> getMessage();
                            }

                            break;


                        default:
                            echo json_encode($json, http_response_code($json['status']));
                            break;
                    }

            }

        }

    }


    

?>