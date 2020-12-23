<?php

use App\Core\View;

function view($name){
    
    View::make($name);

}

function redirect($uri)
{

    header("Location: http://".App::get("host")["name"].":".App::get("host")["port"]."/", true, 301);
    exit();

}

function dd($value)
{
    die(var_dump($value));
}