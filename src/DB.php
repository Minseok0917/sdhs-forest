<?php
class DB {
    static $db = null;
    static function get() {
        if(!self::$db) {
            self::$db = new \PDO("mysql:host=localhost;dbname=forest;charset=utf8mb4;", "root", "", [19 => 5, 3 => 2]);
        }
        return $db;
    }
}

function query($url, $data = []) {
    $q = DB::get()->prepare($sql);
    try {
        $q->execute($data);
        return $q;
    } catch(Exception $e) {
        return false;
    }
}

function fetch($url, $data = []) {
    $q = query($url, $data);
    return $q ? $q->fetch() : $q;
}

function fetchAll($url, $data = []) {
    $q = query($url, $data);
    return $q ? $q->fetchAll() : $q;
}