<?php

    class ResultadosEjecuciones {
        
        public function error404 ()
        {
            return json_encode(array('status' => 404, 'result' => 'Not Found'), http_response_code(404));
        }

        public function resultado200 ()
        {
            return json_encode(array('status' => 200, 'result' => 'Successfully'), http_response_code(200));
        }

        public function resultado201 ()
        {
            return json_encode(array('status' => 201, 'result' => 'Created'), http_response_code(201));
        }

        public function error401 ()
        {
            return json_encode(array('status' => 401, 'result' => 'Unauthorized'), http_response_code(401));
        }

    }

?>