<?php 
    $dsn = 'mysql:host=localhost;dbname=luczaydonyadiu';
    $username = 'luczaydonyadiu';
    $password = 'NeverMind99';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        include('views/error404_main.php');
        exit();
    }
?>