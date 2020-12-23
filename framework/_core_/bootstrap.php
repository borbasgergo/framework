<?php


// app
require "App.php";

// database
require __DIR__ . "/database/property.php";
require __DIR__ . "/database/connection.php";
require __DIR__ . "/database/database.php";
require __DIR__ . "/database/querybuilder.php";

// _core_
require "Request.php";
require "Response.php";
require "Router.php";
require "View.php";

// else 
require __DIR__ . "/extends/models.php";
require "./models/Task.php";

// controllers
require "./controllers/PagesController.php";
require "./controllers/PostController.php";


require "helperFunctions/helpers.php";

$config = require __DIR__ . "/config/config.php";

$pdo = Connection::connect($config["database"]);

App::bind("db", $pdo);
App::bind("host", $config["host"]);




