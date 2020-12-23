<?php

use App\Core\Router;

Router::get("", [PagesController::class, "index"]);
Router::get("about", [PagesController::class, "about"]);

Router::post("send", [PostController::class, "send"]);