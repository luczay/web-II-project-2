<?php
    class Logout_Controller 
    {
        public function main() 
        {
            $_SESSION['userid'] = 0;
            $_SESSION['userfirstname'] = '';
            $_SESSION['userlastname'] = '';
            $_SESSION['userloginname'] = '';
        }
    }
?>