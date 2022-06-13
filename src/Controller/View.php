<?php
namespace src\Controller;

class View
{
    function main() {
        view("/main");
    }

    function profilePage()
    {
        loginChk();
        view("/user/profile", ["chk" => "profile"]);
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
}



