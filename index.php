<?php
// Подключаемся к БД
$mysqli = new mysqli("localhost", "root", "", "php1611");
// Отправляем запрос
$result = $mysqli->query("SELECT * FROM articles");
$articles = "";
while (($row = $result->fetch_assoc()) != null){
    $articles .= "<h4><a href='/article/".$row['id']."'>".$row['title']."</a></h4><p>".$row['content']."</p>";
}

$content = '<div class="container my-3">'. $articles. '</div>';

require_once('router.php');