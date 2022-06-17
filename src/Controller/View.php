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
        $write = fetchAll("SELECT lt.sn, lt.list_title, lt.list_img, lt.owner, count(ht.user_id) as `heart_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `heart_tbl` as `ht` on lt.sn = ht.list_sn WHERE `owner` = ? GROUP BY `sn`", [$user_id]);

        view("/user/profile", ["chk" => "profile", "thisUser" => $user, "write" => $write]);
    }
    
    function communityPage()
    {
        loginChk();
        $list = fetchAll("SELECT lt.sn, lt.list_title, lt.list_img, lt.owner, count(ht.user_id) as `heart_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `heart_tbl` as `ht` on lt.sn = ht.list_sn GROUP BY `sn`");
        foreach($list as $i) {
            $i->list_img = $i->list_img === "" ? "" : explode("&", $i->list_img)[0];
        }
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



