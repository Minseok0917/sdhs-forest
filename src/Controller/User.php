<?php

namespace src\Controller;

class User{

    function logout(){
        $_SESSION['user'] = '';
        go("/", "로그아웃 되었습니다");
    }
    function signUp(){
        extract($_POST);
        $checkId = fetch("select id from `user_tbl` where id = ?", [$id]); 
            
        if($id == '' || $pwd == '' || $name == ''){
            back("alert('공백이 될 수 없습니다.')");
            return;
        }
        
        if($checkId == $id){
            back("alert('사용할 수 없는 아이디 입니다.');");
            return;
        }
        
     
        $imgName = date("Ymdis");
        $fileType = explode("/",$_FILES['img']['type']);
        $resFile = "./upload/$imgName.$fileType[1]";
        $tmp = $_FILES['img']['tmp_name'];
        move_uploaded_file($tmp, $resFile);
        query("insert into user_tbl (id, pwd, name,profile)values(?,?,?,?)", [$id, $pwd, $name, "$imgName.$fileType[1]"]);
        go("/", "회원가입이 되었습니다");
    }

    function login(){
        extract($_POST);
        
        if($id == '' || $pwd == '' ){
            back("alert('공백이 될 수 없습니다.')");
            return;
        }
        $check = fetch("select * from `user_tbl` where id = ? and pwd = ?", [$id, $pwd]); 
        if(!$check){
            back("아이디와 비밀번호를 확인해주세요");
            return;
        }
        $_SESSION['user'] = $check;
        var_dump($_SESSION['user']->profile);

        go("/", "로그인 되었습니다");
        
        
    }
}