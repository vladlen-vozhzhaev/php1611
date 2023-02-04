<?php
    session_start();
    $requestURI = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];
    $path = explode('/', $requestURI);
    require_once('php/db.php');
    require_once('php/classes/UserController.php');
    require_once('php/classes/ArticleController.php');
    if($path[1]=="reg" and $method=="GET"){
        $content = file_get_contents("reg.php");
    }else if($path[1]=="reg" and $method=="POST"){
        UserController::reg($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['pass']);
    }else if ($path[1]=="login" and $method=="GET"){
        $content = file_get_contents('login.php');
    }else if($path[1]=="login" and $method=="POST"){
        UserController::login($_POST['email'], $_POST['pass']);
    }else if($path[1]=="profile"){
        $content = file_get_contents('profile.php');
    }else if($path[1] == "addArticle" and $method=="GET"){
        $content = file_get_contents('addArticle.php');
    }else if($path[1] == "addArticle" and $method=="POST"){
        ArticleController::addArticle($_POST['title'], $_POST['content'], $_POST['author']);
    } else if($path[1] == ""){}
    else if($path[1] == "article"){
        $content = ArticleController::getArticle($path[2]);
    }else if($path[1] == "getUserData"){
        UserController::getUserData();
    }
    else{
        echo "Страница не найдена 404";
    }
    require_once('template.php');