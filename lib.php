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

function ss() {
    return $_SESSION['user'] ?? false;
}

function script($s) {
    echo "<script>$s</script>";
}

function alert($t = "") {
    !empty($t) && script("alert('$t');");
}

function move($tg, $t = '') {
    alert($t);
    script("location.replace('$tg')");
    exit;
}

function back($t = '') {
    alert($t);
    script("history.back()");
    exit;
}