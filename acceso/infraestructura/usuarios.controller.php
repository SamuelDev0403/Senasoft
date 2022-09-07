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
        
                    try {

                        $var = file_get_contents("php://input");
                        $info = json_decode($var, true);

                        $objDto = new Usuarios();
                        $objDao = new UsuariosDao($objDto);
                        $objService = new UsuarioServices($objDao);
                        $resultado = $objService -> login($info[documento], $info[contrasena]);
        
        
                        if ($resultado->fetch() === false){
                            echo json_encode(array("status"=> '404', "result"=>"Not found"), http_response_code(404));
                        }else {
                            echo json_encode(array("status"=> '200', "result"=>"Success"), http_response_code(200));
                        }
                    } catch (Exception $e) {
                        echo "Error en el controlador " . $e -> getMessage();
                    }
        
                break;

                // case 'POST':
                //         try {
                //             $var = file_get_contents("php://input");

                //             $info = json_decode($var, true);

                //             //  echo($info['documento']);

                //             $objDto = new Usuarios();
                //             $objDto -> setDocumento();
                //             $objDto -> setNombre();
                //             $objDto -> setApellidos();
                //             $objDto -> setContrasena();
                //             $objDto -> setTelCel();
                //             $objDto -> setTelFijo();
                //             $objDto -> setCorreo();
                //             $objDto -> setDireccion();
                //             $objDto -> setFechaNa();
                //             $objDto -> setDiscapacidad();
                //             $objDto -> setAccesoDis();
                //             $objDto -> setConecInt();
                //             $objDto -> setTipoReg();
                //             $objDto -> setMunicipio();
                //             $objDto -> setBarrioVereda();
                //             $objDto -> setIdTipoDoc();
                //             $objDto -> setIdSexo();
                //             $objDto -> setIdEtnia();
                //             $objDto -> setIdEstrato();
                //             $objDto -> setIdNivelEdu();
                //             $objDto -> setIdDispositivo();

                //             $objDao = new UsuariosDao($objDto);
                //             $objService = new UsuarioServices($objDao);

                //             // $objService -> add();

                //         } catch (Exception $e) {
                //             echo "Error en el controlador " . $e -> getMessage();
                //         }
                    // break;

            }

        }

    }


    

?>