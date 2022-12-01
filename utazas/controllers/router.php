<?php 
    session_start();
    if(! isset($_SESSION['userid'])) $_SESSION['userid'] = 0;
    if(! isset($_SESSION['userfirstname'])) $_SESSION['userfirstname'] = "";
    if(! isset($_SESSION['userlastname'])) $_SESSION['userlastname'] = "";
    if(! isset($_SESSION['userloginname'])) $_SESSION['userloginname'] = "";

    $orszag = '';
    $request = $_SERVER['QUERY_STRING'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $page = $request;
    }
    else if ($request == 'tavaszi_utazasok')
    {
        $page = $request;
        $orszag = 'all';
    }
    else if ($request == 'login')
    {
        $page = 'login_page';
    }
    else if ($request == 'register') 
    {
        $page = 'register_page';
    }
    else if ($request == 'logout') 
    {
        $page = 'logout';
    }
    else if ($request == 'arfolyamok')
    {
        $page = 'arfolyamok_page';
    }
    else
    {
        $page = 'main_page';
    }

    $controllerfile = $page;
    $target = SERVER_ROOT.'controllers/'.$controllerfile.'.php';
    if(! file_exists($target))
    {
        $controllerfile = "error404";
        $target = SERVER_ROOT.'controllers/error404.php';
    }

    include_once($target);
    $class = ucfirst($controllerfile).'_Controller';
    if(class_exists($class))
    { 
        $controller = new $class; 
        if ($controllerfile == 'tavaszi_utazasok')
        {
            echo('inside utazasok');
            if ($orszag != 'all')
            {
                $orszag = $_POST['orszag'];
            } 
            $controller->main($orszag);
        } 
        else if ($controllerfile == 'arfolyamok') 
        {
            $controller->main($_POST['start_date'], $_POST['end_date'], $_POST['currency_names']);
        }
        else if ($controllerfile == 'login')
        {
            $controller->main($_POST['uname'], $_POST['password']);
        }
        else if ($controllerfile == 'register')
        {
            $controller->main($_POST['first_name'], $_POST['last_name'], $_POST['uname'], $_POST['password']);
        }
        else
        {
            $controller->main();
        }
    }
    else 
    { 
        die('class does not exists!'); 
        
    }
    
?>