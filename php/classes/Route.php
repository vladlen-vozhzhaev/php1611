<?php

class Route{
    public static function post($path, $callback){
        if($path == $_SERVER['REQUEST_URI'] and $_SERVER['REQUEST_METHOD'] == "POST"){
            $callback();
        }
    }

    public static function get($path, $callback){
        if($path == $_SERVER['REQUEST_URI'] and $_SERVER['REQUEST_METHOD']== "GET"){
            $content = $callback();
        }
        require_once('template.php');
    }
}