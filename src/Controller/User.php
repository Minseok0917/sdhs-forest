<?php

namespace src\Controller;

class User {
    function register() {
        extract($_POST);
        $user = query("INSERT INTO `user` SET id=?, password=?, name=?", [$id, $password, $name]);
        if($user) {
            move("/login", "회원가입 성공");
        }
        back('중복되는 id 입니다.');
    }
    function login() {
        extract($_POST);
        $data = fetch("SELECT * FROM user WHERE id=? AND password=?", [$id, $password]);
        if(!$data) {
            move("/login", '틀렸다 아이디 또는 비밀번호');
        }
        $_SESSION['user'] = $data;
        move("/", "로그인 완료");
    }
    function logout() {
        unset($_SESSION['user']);
        move("/", "되었다 로그아웃.");
    }
}