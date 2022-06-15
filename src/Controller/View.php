<?php
namespace src\Controller;

class View
{
    function home()
    {
        view("home");
    }
    function profilePage($args)
    {
        loginChk();
        $user_id = $args[1];
        $user = fetch("SELECT `user_id`, `user_name`, `profile_img` FROM `user_tbl` WHERE `user_id` = ?", [$user_id]);

        view("/user/profile", ["chk" => "profile", "thisUser" => $user]);
    }
    
    function communityPage()
    {
        loginChk();
        $list = fetchAll("SELECT `sn`, `list_title`, `list_img`, `owner` FROM `list_tbl`");
        // echo "<pre>";
        // var_dump($list);
        // echo "</pre>";
        view("/list/community", ["chk" => "community", "list" => $list]);
    }

    function loginPage()
    {
        view("/login", ["chk" => "login"]);
    }

    function signupPage()
    {
        view("/signup", ["chk" => "signup"]);
    }

}



