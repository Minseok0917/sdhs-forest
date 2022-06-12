<?php
namespace src\Controller;

class DB
{
    static $db = null;
    static function get()
    {
        if(is_null(self::$db)) {
            $option = [ 19 => 5, 3 => 2 ];

            self::$db = new \PDO("mysql:host=localhost; dbname=sdhsForest; charset=utf8mb4", "root", "", $option);
        }
        return self::$db;
    }
}


function execute($sql, $data = []) {
    $q = DB::get()->prepare($sql);
    return $q->exeucte($data);
};

function fetch($sql, $data = []) {
    $q = DB::get()->prepare($sql);
    $q->exeucte($data);
    return $q->fetch(); 
};

function fetchAll($sql, $data = []) {
    $q = DB::get()->prepare($sql);
    $q->exeucte($data);
    return $q->fetchAll(); 
};
