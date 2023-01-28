<?php
    session_start();
    $requestURI = $_SERVER['REQUEST_URI'];
    $path = explode('/', $requestURI);
    if($path[1]=="reg"){
        $content = file_get_contents("reg.php");
    }else if ($path[1]=="login"){
        $content = file_get_contents('login.php');
    }else if($path[1]=="profile"){
        $content = file_get_contents('profile.php');
    }else{
        echo "Страница не найдена 404";
    }
    require_once('template.php');