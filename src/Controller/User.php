<?php
namespace src\Controller;

class User
{
    function signupPro() {
        [$id, $pass, $passc, $name] = post("id", "pass", "passc", "name");
        $imgName = "default";
        $profileImg = $_POST["base64Img"];

        if($pass !== $passc) {
            back("비밀번호가 일치 하지 않습니다.");
        }
        
        if($profileImg !== "default") {
            $data = explode(",", $profileImg)[1];
            file_put_contents("./resource/img/profile/{$name}.jpg", base64_decode($data));
            $imgName = $name;
        }

        execute("INSERT INTO `user_tbl`(`user_id`, `user_password`, `user_name`, `profile_img`) VALUES(?, ?, ?, ?)", [$id, $pass, $name, $imgName]);

        move("/login", "회원가입 되었습니다.");
    }

    function loginPro() {
        [$id, $pass] = post("id", "pass");

        $user = fetch("SELECT * FROM `user_tbl` WHERE `user_id` = ? AND `user_password` = ? ", [$id, $pass]);


        if(!$user) {
            back("아이디 혹은 비밀번호가 일치하지 않습니다.");
        }

        $_SESSION["user"] = $user;
        move("/", "로그인 되었습니다.");
    }

    function logout()
    {
        unset($_SESSION["user"]);

        move("/", "로그아웃 되었습니다.");
    }
}




