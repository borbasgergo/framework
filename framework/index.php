<?php

require "./_core_/bootstrap.php";


use App\Core\Router;
use App\Core\Request;
use App\Core\Response;


Response::send(
    Router::load("./web/routes.php")
        ->direct(Request::uri(), Request::method())
);



