<?php


class Connection 
{

    public static function connect($config)
    {

        try {

            return new PDO(

                $config["database_type"].":host=".$config["host"].";dbname=".$config["database_name"],
                $config["username"], 
                $config["password"]

            );
            
        } catch ( PDOException $e) {

            die($e->getMessage());

        }

    }

}