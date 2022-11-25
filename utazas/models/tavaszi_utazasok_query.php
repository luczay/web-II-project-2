<?php
    require(SERVER_ROOT . 'models/database.php');
    function tavaszi_utazasok($orszag) 
    {
        global $db;
        if ($orszag == 'all')
        {
            $query = " 
                SELECT *
                FROM szalloda
                    INNER JOIN tavasz ON tavasz.szalloda_az = szalloda.az 
                    INNER JOIN helyseg ON helyseg.az = szalloda.helyseg_az
            ";
        }
        else 
        {
            if ($orszag == "Egyiptom") 
            {
                $query = " 
                    SELECT *
                    FROM szalloda
                        INNER JOIN tavasz ON tavasz.szalloda_az = szalloda.az 
                        INNER JOIN helyseg ON helyseg.az = szalloda.helyseg_az
                    WHERE szalloda.helyseg_az = 3 OR szalloda.helyseg_az = 4
                ";
            }
            else 
            {
                $query = " 
                    SELECT *
                    FROM szalloda
                        INNER JOIN tavasz ON tavasz.szalloda_az = szalloda.az 
                        INNER JOIN helyseg ON helyseg.az = szalloda.helyseg_az
                    WHERE szalloda.helyseg_az = 1 OR szalloda.helyseg_az = 2
                ";
            }
        }

        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
?>