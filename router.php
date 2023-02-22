<?php
    session_start();
    // "/deleteArticle/2" -> $path = ["", "deleteArticle", "2"] -> if($path[1] == "deleteArticle"){выполняем инструкции удаления статьи}
    // "/reg" -> $path = ["", "reg"] -> if($path[1] == "reg"){открывем страницу регистрации}
    // "/login" -> $path = ["", "login"] -> if($path[1] == "login"){открываем страницу авторизации}
    $requestURI = $_SERVER['REQUEST_URI']; // Получаем URI по которому запрошена страница
    $method = $_SERVER['REQUEST_METHOD']; // Получаем метод запроса
    $path = explode('/', $requestURI);
    require_once('php/db.php');
    require_once('php/classes/UserController.php');
    require_once('php/classes/ArticleController.php');
    require_once('php/classes/Route.php');

    Route::get('/', function (){return ArticleController::getArticles();});
    Route::get('/reg', function (){return file_get_contents("reg.php");});
    Route::get('/login', function (){return file_get_contents('login.php');});
    Route::get('/article/{id}', function (){return file_get_contents('article.html');});
    Route::get("/getUsers", function (){UserController::getUsers();});
    Route::get('/users', function (){return file_get_contents('users.html');});
    Route::post('/reg', function (){UserController::reg($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['pass']);});
    Route::post('/login', function (){UserController::login($_POST['email'], $_POST['pass']);});
    Route::post('/article/{id}', function ($id){return ArticleController::getArticle($id);});

    if($_SESSION['id']){
        Route::get('/profile', function (){return file_get_contents('profile.php');});
        Route::get('/addArticle', function (){return file_get_contents('addArticle.php');});
        Route::get('/deleteArticle', function (){ArticleController::deleteArticle(null);});
        Route::get('/getUserData', function (){UserController::getUserData();});
        Route::get('/updateArticle', function (){return file_get_contents('updateArticle.html');});
        Route::get('/exit', function (){UserController::logout();});
        Route::post('/addArticle', function (){ArticleController::addArticle($_POST['title'], $_POST['content'], $_POST['author']);});
        Route::post('/updateArticle', function (){ArticleController::updateArticle($_POST['id'], $_POST['title'], $_POST['content'], $_POST['author']);});
        Route::post('/uploadAvatar', function (){UserController::uploadAvatar();});
    }else{
        header('Location: /login');
    }