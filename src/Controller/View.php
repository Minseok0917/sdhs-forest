<?php

namespace src\Controller;

class View {
    function main() {
        view('main');
    }
    function test($data) {
        $id = $data[1];
        view('test', ['id' => $id]);
    }
    function register() {
        view('auth/register');
    }
    function login() {
        view('auth/login');
    }
    function profile($idx) {
        var_dump($idx);
        // $user = fetch("SELECT * FROM WHERE idx = $idx");
        // echo $user;
        // view('profile', ['id' => $id, 'name' => $name]);
        view('profile');
    }
}