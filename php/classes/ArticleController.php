<?php
class ArticleController{
    public static function getArticles(){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM articles");
        $articles = "";
        while (($row = $result->fetch_assoc()) != null){
            //$articles .= "<h4><a href='/article/".$row['id']."'>".$row['title']."</a></h4><p>".$row['content']."</p>";
            $content = $row['content'];
            $html = str_get_html($content);
            $content = $html->plaintext;
            $content = substr($content, 0, 90)."...";
            $articles .= '
                <div class="post-preview">
                        <a href="/article/'.$row['id'].'">
                            <h2 class="post-title">'.$row['title'].'</h2>
                            <h3 class="post-subtitle">'.$content.'</h3>
                        </a>
                        <p class="post-meta">
                            Автор: '.$row['author'].'
                        </p>
                </div>
            ';
        }
        return $articles;
    }

    public static function addArticle($title, $content, $author){
        global $mysqli;
        $html = str_get_html($content);
        $img = $html->find("img", 0);
        $data = explode(",", $img->src);
        $extension =  explode("/", explode(";",$data[0])[0])[1];
        $fileName = "img/".microtime().".".$extension;
        $ifp = fopen($fileName, 'wb');
        fwrite( $ifp, base64_decode( $data[1] ) );
        fclose( $ifp );
        $img->src = "/".$fileName;
        /*
         * 1) Ищем все картинки img в переменной $content
         * 2) Достаём из них значение атрибута src
         * 3) Создаём и записываем файл из данных полученныз на 2 шаге
         * 4) Формируем ссылку на этот файл
         * 5) Сохраняем эту ссылку в src картинки
         * 6) Сохраняем результат в БД
         * */
        $mysqli->query("INSERT INTO articles (title, content, author) VALUES ('$title', '$html', '$author')");
        $response = json_encode(["result"=>"success"]);
        exit($response);
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
    public static function saveComment(){
        global $mysqli;
        $userId = $_POST['userId'];
        $articleId = $_POST['articleId'];
        $comment = $_POST['comment'];
        $mysqli->query("INSERT INTO `comments`(`user_id`, `article_id`, `comment`) VALUES ('$userId', '$articleId', '$comment')");
        return json_encode(["result"=>"success"]);
    }
    public static function getCommentsByArticleId($articleId){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM comments, users WHERE article_id = '$articleId' AND comments.user_id = users.id");
        $comments = [];
        while (($row = $result->fetch_assoc()) != null){
            $comments[] = $row;
        }
        exit(json_encode($comments));
    }
}