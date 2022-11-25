<?php
    require(SERVER_ROOT . 'models/database.php');
    function login($username, $password) {
        global $db;
        $query = " 
                    SELECT id, firstname, lastname, username
                    FROM user
                    WHERE username = :username AND password = :password
                ";
        $statement = $db->prepare($query);
        $statement->execute(array(':username'=>$username, ':password'=>sha1($password)));
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    }
?>