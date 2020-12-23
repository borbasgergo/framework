<?php

namespace App\Core;

class Request
{

    public static function uri() {

        return trim(

            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),

         "/");
        
    }

    public static function method() {

        return $_SERVER["REQUEST_METHOD"];
        
    }

    public static function get($key) {

        switch(static::method()){

            case "GET":
                return $_GET[$key] ?? null;
            
            case "POST":
                return $_POST[$key] ?? null;

        }

    }

    public static function cookie($name) {

        return $_COOKIE[$name] ?? null;

    }

}