<?php

namespace App\Database;

class Property
{

    /*

        what: ["*"] or ["elem1", "elem2"...]

        table: table name

        where: ["name" => "value"...]

    */

    protected static $table;
    protected static $where = [];
    protected static $what = ["*"];
    protected static $insertWhat = [];

    public static function table($name)
    {

        static::$table = $name;

        return new static;

    }

    public static function what($values) 
    {
        
        foreach($values as $key => $value) 
        {
            static::$insertWhat[$key] = $value;
        }

        return new static;
        

    }

    public static function where($name, $value)
    {

        static::$where[$name] = $value;

        return new static;

    }

}