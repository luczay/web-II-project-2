<pre>
    <?php
         function getExchangeRates($startDate, $endDate, $currencyNames)
         {
             try {
                 $soapClient = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
                 $result = $soapClient->GetExchangeRates(array('startDate' => $startDate, 'endDate' => $endDate, 'currencyNames' => $currencyNames))->GetExchangeRatesResult;
             } catch (SoapFault $e) {
                 $result = false;
             }
      
             return $result;
         }
    ?>
</pre>