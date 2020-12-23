<?php


namespace App\Database;

class QueryBuilder extends Property
{

    public static function selectQuery($where, $table, $what)
    {

        $initWhere = "";

        if(static::checkWhere($where)){
            $initWhere = static::buildWhere($where);
        }

        return sprintf("select %s from %s %s",

                implode(",", $what),
                $table,
                $initWhere ? "where ".$initWhere : ""
                
            );

    }

    public static function insertQuery($where, $what)
    {

        /* 
            what = [
                "name" => "value"
            ]
        */
        
        $names = implode(",", array_keys($what));
        
        $values = "";
        $counter = 0;
        foreach(array_values($what) as $val) {
            if($counter != 0) {
                
                $values .= ",";
            }
            $values .= "'{$val}'";

            $counter++;
        }

        return sprintf("insert into %s (%s) values (%s)",
        
                $where, 
                $names,
                $values

            );


    }

    protected static function checkWhere($where)
    {

        if(count($where) > 0) {
            return true;
        } 

        return false;

    }

    protected static function buildWhere($where)
    {

        $init = "";

        foreach($where as $key => $value) {

            if(! array_key_first($where)) {
                $init .= " and ";
            }
            $init .= $key."=".$value;

        }

        return $init;

    }

}