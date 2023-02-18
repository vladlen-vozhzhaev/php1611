<?php

class Route{
    public static function post($path, $callback){
        if($path == $_SERVER['REQUEST_URI'] and $_SERVER['REQUEST_METHOD'] == "POST"){
            $callback();
            exit;
        }
    }

    public static function get($path, $callback){
        /*if(strpos($path, "{")){
            $uriChunks = explode('/', $_SERVER['REQUEST_URI']);
            for($i=0; $i<count($uriChunks); $i++){
                echo $uriChunks[$i]."<br>";
            }
            exit;
        }else*/
        $requestURI = $_SERVER['REQUEST_URI']; // Получаем URI по которому запрошена страница
        $method = $_SERVER['REQUEST_METHOD']; // Получаем метод запроса
        $paths = explode('/', $requestURI);
        if($path == '/'.$paths[1] and $_SERVER['REQUEST_METHOD']== "GET"){
            $content = $callback();
            require_once('template.php');
            exit;
        }
    }
}