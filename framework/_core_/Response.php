<?php

namespace App\Core;

class Response 
{

    public static function send($data)
    {

        if(! $data){

            return;

        } else {

            echo json_encode($data);

        }
    }

    public static function setCookie($name, $value)
    {
        return setcookie($name, $value);
    }

}