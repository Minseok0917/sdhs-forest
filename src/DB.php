<?php
class DB {
    static $db = null;
    static function get() {
        if(!self::$db) {
            self::$db = new \PDO("mysql:host=localhost;dbname=sdhs_forest;charset=utf8mb4;", "root", "", [19 => 5, 3 => 2]);
        }
        return self::$db;
    }
}

function query($sql, $data = []) {
    $q = DB::get()->prepare($sql);
    $q->execute($data);
    return $q;
}

function fetch($sql, $data = []) {
    $q = query($sql, $data);
    return $q ? $q->fetch() : $q;
}

function fetchAll($sql, $data = []) {
    $q = query($sql, $data);
    return $q ? $q->fetchAll() : $q;
}