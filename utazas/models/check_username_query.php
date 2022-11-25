<?php
    require(SERVER_ROOT . 'models/database.php');
    function check_username($username) {
        global $db;
        $query = "
                    SELECT username
                    FROM user
                    WHERE username = :username
                ";
        $statement = $db->prepare($query);
        $statement->execute(array(':username'=>$username));
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
?>