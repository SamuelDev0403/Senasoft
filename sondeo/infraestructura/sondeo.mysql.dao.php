<?php

    class SondeoDao implements SondeoRepository{
        private $idSondeo;
        private $titulo;
        private $fechaApertura;
        private $fechaCierre;
        private $tematicaAbordada;
        private $idSexo;
        private $idEtnia;
        private $idPregunta;
        private $descripcionPregunta;
        private $idRespuesta;
        private $descripcionRespuesta;

        public function __construct ($objDto)
        {
            $this -> idSondeo = $objDto -> getIdSondeo();
            $this -> titulo = $objDto -> getTitulo();
            $this -> fechaApertura = $objDto -> getFechaApertura();
            $this -> fechaCierre = $objDto -> getFechaCierre();
            $this -> tematicaAbordada = $objDto -> getTematicaAbordada();
            $this -> idSexo = $objDto -> getIdSexo();
            $this -> idEtnia = $objDto -> getIdEtnia();
            $this -> idPregunta = $objDto -> getIdPregunta();
            $this -> descripcionPregunta = $objDto -> getDescripPregunta();
            $this -> idRespuesta = $objDto -> getIdRespuesta();
            $this -> descripcionRespuesta = $objDto -> getDescripRespuesta();
        }

        public function addSondeo ()
        {
            $estado = false;
            $sql = "CALL spAddSondeo(?,?,?,?,?,?)";

            try {
                $con = new ConexionSondeo();
                $stmt = $con -> getConexion() -> prepare($sql);
                $stmt -> bindParam(1, $this -> titulo, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> fechaApertura, PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> fechaCierre, PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> tematicaAbordada, PDO::PARAM_STR);
                $stmt -> bindParam(5, $this -> idSexo, PDO::PARAM_INT);
                $stmt -> bindParam(6, $this -> idEtnia, PDO::PARAM_INT);
                $stmt -> execute();
                $estado = $stmt;

            } catch (Exception $e) {
                echo "Error en el dao";
            }
            return $estado;
        }

        public static function viewAllSondeo ()
        {
            $estado = false;
            $sql = "CALL spSearchAllSondeo()";

            try {
                $con = new ConexionSondeo();
                $stmt = $con -> getConexion() -> prepare($sql);
                $stmt -> execute();
                $estado = $stmt;

            } catch (Exception $e) {
                echo "Error en el dao";
            }
            return $estado;
        }

        public static function addPregunta ($descripcionPregunta)
        {
            $estado = false;
            $sql = "CALL spAddPregunta(?)";

            try {
                $con = new ConexionSondeo();
                $stmt = $con -> getConexion() -> prepare($sql);
                $stmt -> bindParam(1, $descripcionPregunta, PDO::PARAM_STR);
                $stmt -> execute();
                $estado = true;

            } catch (Exception $e) {
                echo "Error en el dao";
            }
            return $estado;
        }

        public static function addRespuesta ($descripcionRespuesta)
        {
            $estado = false;
            $sql = "CALL spAddRespuesta(?)";

            try {
                $con = new ConexionSondeo();
                $stmt = $con -> getConexion() -> prepare($sql);
                $stmt -> bindParam(1, $descripcionRespuesta, PDO::PARAM_STR);
                $stmt -> execute();
                $estado = true;

            } catch (Exception $e) {
                echo "Error en el dao";
            }
            return $estado;
        }

    }

?>