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
}