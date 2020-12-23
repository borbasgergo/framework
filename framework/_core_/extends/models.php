<?php

namespace App\Core;

use App\Database\DB;

class Models
{


    public static function findById($id)
    {

        return  DB::table(get_class(new static))->where('id', $id)->fetch() ?? null;

    }


    public static function find($what, $value)
    {

        return DB::table(get_class(new static))->where($what, $value)->fetch() ?? null;

    }

    public static function findAll()
    {
        return DB::table(get_class(new static))->fetchAll();
    }

}