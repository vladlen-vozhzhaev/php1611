<?php
class ArticleController{
    public static function getArticles(){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM articles");
        $articles = "";
        while (($row = $result->fetch_assoc()) != null){
            $articles .= "<h4><a href='/article/".$row['id']."'>".$row['title']."</a></h4><p>".$row['content']."</p>";
        }
        return '<div class="container my-3">'. $articles. '</div>';
    }

    public static function addArticle($title, $content, $author){
        global $mysqli;
        $mysqli->query("INSERT INTO articles (title, content, author) VALUES ('$title', '$content', '$author')");
        header("Location: /");
    }
    public static function getArticle($articleId){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM articles WHERE id = $articleId");
        $row = $result->fetch_assoc();
        return json_encode($row);
    }

    public static function deleteArticle($articleId){
        global $mysqli; // Получаем доступ к переменной, которая отвечает за подключение к БД
        $mysqli->query("DELETE FROM articles WHERE id=$articleId"); // Отправляем запрос на удаление к БД
        header('Location: /'); // Переадресуем пользователя на главную страницу
    }
    public static function updateArticle($articleId, $title, $content, $author){
        global $mysqli;
        $mysqli->query("UPDATE articles SET title='$title',content='$content',author='$author' WHERE id=$articleId");
        header("Location: /article/$articleId");
    }
}