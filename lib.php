<?php
spl_autoload_register(function($f) {
    $f = str_replace("\\", "/", $f);
    require_once("../{$f}.php");
});

function view($fileName, $d = []) {
    extract($d);
    require "src/View/header.php";
    require "src/View/$fileName.php";
    require "src/View/footer.php";
}