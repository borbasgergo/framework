<?php

namespace App\Core;

class View {

    public static function make($name, $data = null) {

        if($data){
            extract($data);
        }


        require "./views/{$name}.view.php";
        return;
    }

}