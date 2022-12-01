<?php
require_once(SERVER_ROOT . 'models/login_query.php');

    class Login_Controller 
    {
        public function main($username, $password) 
        {
            $result = login($username, $password);
            $response = array('response' =>'Sikeres belélpés!', 'to_main_page' => 1);
            if (count($result) > 0) 
            {
                $_SESSION['userid'] = $result[0]['id'];
                $_SESSION['userfirstname'] = $result[0]['firstname'];
                $_SESSION['userlastname'] = $result[0]['lastname'];
                $_SESSION['userloginname'] = $result[0]['username'];
                echo(json_encode($response));
            }
            else 
            {
                $response['response'] = 'Rossz felhasználónév vagy jelszó!';
                $response['to_main_page'] = 0;
                echo(json_encode($response));
            }
        }
    }
?>