<?php

namespace src\Controller;

class View {
    function main() {
        $data = fetchAll("SELECT * FROM `post` ORDER BY idx DESC");
        view('main', ['data' => $data]);
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
    function profile($data) {
        $user = fetch("SELECT * FROM user WHERE name=?", [$data[1]]);
        view('profile', ['id' => $user->id, 'name' => $user->name]);
    }
    function createPost() {
        view('createPost');
    }
    function createPostCtrl() {
        extract($_POST);
        fetch('INSERT INTO `post`(`writer`, `title`, `content`) VALUES (?,?,?)', [ss()->id, $title, $content]);
        move('/');
    }
    function detailPost($data) {
        $post = fetch("SELECT * FROM post WHERE idx=?", [$data[1]]);
        view('detailPost', ['idx' => $post->idx, 'writer' => $post->writer, 'title' => $post->title, 'content' => $post->content]);
    }
    function editPost($data) {
        view('editPost', ['idx' => $data[1]]);
    }
    function editPostCtrl($data) {
        extract($_POST);
        fetch("UPDATE `post` SET `title`=?, `content`=? WHERE idx=?", [$title, $content, $data[1]]);
        move('/', '완료되었다 수정.');
    }
    function deletePost($data) {
        fetch("DELETE FROM `post` WHERE idx=?", [$data[1]]);
        move('/', '완료되었다 삭제.');
    }
}