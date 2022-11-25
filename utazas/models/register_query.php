<?php
    require(SERVER_ROOT . 'models/database.php');
    function register($firstname, $lastname, $username, $password) {
        global $db;
        $query = " 
                    insert into user(firstname, lastname, username, password)
                        values(:firstname, :lastname, :username, :password)
                ";
        $statement = $db->prepare($query);
        $statement->execute(array(':firstname'=>$firstname, ':lastname'=>$lastname, ':username'=>$username, ':password'=>sha1($password)));
        $statement->closeCursor();
    }
?>