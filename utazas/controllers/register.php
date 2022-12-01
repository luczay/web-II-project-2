<?php
require_once(SERVER_ROOT . 'models/check_username_query.php');
require_once(SERVER_ROOT . 'models/register_query.php');

    class Register_Controller 
    {
        public function main($firstname, $lastname, $username, $password) 
        {
            $result = check_username($username);
            $response = array('response' =>'Sikeres regisztráció!', 'to_main_page' => 1);
            if (count($result) > 0) 
            {
                $response['response'] = 'A felhasználónév már foglalt!';
                $response['to_main_page'] = 0;
                echo(json_encode($response));
            }
            else 
            {
                register($firstname, $lastname, $username, $password);
                echo(json_encode($response));
            }
        }
    }
?>