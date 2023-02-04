<?php
class ArticleController{
    public static function addArticle($title, $content, $author){
        global $mysqli;
        $mysqli->query("INSERT INTO articles (title, content, author) VALUES ('$title', '$content', '$author')");
        header("Location: /");
    }
    public static function getArticle($articleId){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM articles WHERE id = $articleId");
        $row = $result->fetch_assoc();
        $content = "<h1>".$row['title']."</h1><div>".$row['content']."</div>".$row['author'];
        return $content;
    }
}