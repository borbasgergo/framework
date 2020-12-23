<?php

namespace App\Core;

use Exception;

class Router 
{

    protected static $routes = [
        "GET" => [],
        "POST" => [],
    ];


    public static function load($file)
    {

        require($file);

        return new static;
    }


    public static function get($uri, $controllerArray)
    {   
        // controllerArray: [0] => class, [1] => method
        $uri = trim($uri, "/");

        static::$routes['GET'][$uri]["controller"] = $controllerArray;
    }


    public static function post($uri, $controllerArray)
    {

        // controllerArray: [0] => class, [1] => method
        $uri = trim($uri, "/");

        static::$routes['POST'][$uri]["controller"] = $controllerArray;

    }

    public static function direct($uri, $requestType)
    {

        if(! array_key_exists($uri, static::$routes[$requestType])) {
            
            throw new Exception("No controller for this URL");
        }

        //die(var_dump(static::$routes[$requestType][$uri]["controller"]));
        return static::action(
            static::$routes[$requestType][$uri]["controller"]
        );

    }

    public static function action($controller) {

        $method = $controller[1];

        $controller = "App\\Controllers\\{$controller[0]}";
        
        $controller = new $controller();
        

        if(! method_exists($controller, $method )) {
            throw new Exception("No method");
        }

        return $controller->$method();

    }

}