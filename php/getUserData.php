<?php
    session_start();
    // Array
    $userData = [
        'id'=>$_SESSION['id'],
        'name'=>$_SESSION['name'],
        'lastname'=>$_SESSION['lastname'],
        'email'=>$_SESSION['email']
    ];
    // Преобразуем Array в JSON
    $jsonUserData = json_encode($userData);
    // Показываем на экране данные в формате JSON
    exit($jsonUserData);