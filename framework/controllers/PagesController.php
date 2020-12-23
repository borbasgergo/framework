<?php

namespace App\Controllers;

use App\Core\View;
use Task;

class PagesController
{

    public function index() {

        $tasks = Task::findAll();

        return View::make("index", [

            "tasks" => $tasks
            
        ]);

    }

    public function about() {

        return View::make("about");

    }

}