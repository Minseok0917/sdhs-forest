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
        view("/community", ["chk" => "community"]);
    }

    function loginPage()
    {
        view("/login", ["chk" => "login"]);
    }

    function signupPage()
    {
        view("/signup", ["chk" => "signup"]);
    }

    function insertList()
    {
        view("/insertList", ["chk" => "community"]);
    }
}



