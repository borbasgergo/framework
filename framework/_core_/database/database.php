<?php

namespace App\Database;

use App;
use PDO;
use PDOException;

// DATABASE 
class DB extends Property
{

    protected static function prepare($sql)
    {

        return App::get("db")->prepare($sql);

    }


    /*

        SQL METHOD => INSERT

    */
    public static function insert($sql = null)
    {

        // Check, if $sql is set through param
        $sql = static::checkAndBuildSql($sql, "insert");
        
        try {

            $statement = static::prepare($sql);

            $statement->execute();

        } catch( PDOException $e){
            dd($e);
        }

    }

    /* 
    
        SQL METHOD => SELECT (more)
    
    */
    public static function fetchAll($sql = null) 
    {

        $sql = static::checkAndBuildSql($sql, "select");

        $statement = static::prepare($sql);

        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_OBJ);

    }


    /* 
    
        SQL METHOD => SELECT (single)
    
    */
    public static function fetch($sql = null)
    {
        $sql = static::checkAndBuildSql($sql, "select");
        
        $statement = static::prepare($sql);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_OBJ);

    }


    protected static function checkAndBuildSql($sql, $type)
    {
    
        if(! $sql) {

            switch($type) {

                case "select":

                    return QueryBuilder::selectQuery(
                        static::$where,
                        static::$table,
                        static::$what
                    );
                
                case "insert":

                    return QueryBuilder::insertQuery(
                        static::$table,
                        static::$insertWhat
                    );
                    
            }

        } else {

            return $sql;
        }

    }

}