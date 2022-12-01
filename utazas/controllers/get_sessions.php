<?php
    class Get_sessions_Controller 
    {
        public function main() 
        {
            $response = array('userid' => $_SESSION['userid'], 'userfirstname' => $_SESSION['userfirstname'], 'userlastname' => $_SESSION['userlastname'], 'userloginname' => $_SESSION['userloginname']);
            echo(json_encode($response));
        }
    }
?>