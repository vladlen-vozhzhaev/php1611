<?php
    $requestURI = $_SERVER['REQUEST_URI'];
    $path = explode('/', $requestURI);
    if($path[1]=="reg"){
        echo "Страница регистрации";
    }else if ($path[1]=="login"){
        echo "Страница авторизации";
    }else{
        echo "Страница не найдена 404";
    }