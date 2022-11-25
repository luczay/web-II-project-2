<?php
    require_once(SERVER_ROOT . 'models/arfolyamok_query.php');

    class Arfolyamok_Controller 
    {
        public function main($startDate, $endDate, $currencyNames) 
        {
            $results = getExchangeRates($startDate, $endDate, $currencyNames);
            var_dump($results);
        }
    }
?>