<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Router;
use App\Database\DB;

class PostController {

    public function send() {

        DB::table('task')
            ->what(["task" => Request::get("task")])
            ->insert();

        return redirect("");

    }

}