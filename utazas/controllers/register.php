<?php
require_once(SERVER_ROOT . 'models/check_username_query.php');
require_once(SERVER_ROOT . 'models/register_query.php');

    class Register_Controller 
    {
        public function main($firstname, $lastname, $username, $password) 
        {
            $result = check_username($username);
            if (count($result) > 0) 
            {
                echo('Username is taken');
            }
            register($firstname, $lastname, $username, $password);
        }
    }
?>