<?php
    require_once(SERVER_ROOT . 'models/tavaszi_utazasok_query.php');

    class Tavaszi_utazasok_Controller 
    {
        public function main($orszag) 
        {
            $results = tavaszi_utazasok($orszag);
            var_dump($results);
        }
    }
?>