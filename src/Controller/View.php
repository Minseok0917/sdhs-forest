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
        $like = fetchAll("SELECT lt.sn, lt.list_title, lt.list_img, lt.owner, count(ht.user_id) as `heart_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `heart_tbl` as `ht` on lt.sn = ht.list_sn WHERE ht.user_id = ? GROUP BY `sn`", [$user_id]);
        foreach($write as $w) {
            $w->list_img = $w->list_img === "" ? "" : explode("&", $w->list_img)[0];
        }
        foreach($like as $l) {
            $l->list_img = $l->list_img === "" ? "" : explode("&", $l->list_img)[0];
        }

        view("/user/profile", ["chk" => "profile", "thisUser" => $user, "write" => $write, "like" => $like]);
    }
    
    function communityPage()
    {
        loginChk();
        $list = fetchAll("SELECT lt.sn, lt.list_title, lt.list_img, lt.owner, count(ht.user_id) as `heart_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `heart_tbl` as `ht` on lt.sn = ht.list_sn GROUP BY `sn` order by `sn` desc");
        $hit = fetchAll("SELECT lt.sn, ifnull(sum(hit.count), 0) as `hit_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `hits_tbl` as `hit` on lt.sn = hit.list_sn GROUP BY lt.sn ORDER BY lt.sn desc");

        foreach($list as $i) {
            $i->list_img = $i->list_img === "" ? "" : explode("&", $i->list_img)[0];
        }
        
        view("/list/community", ["chk" => "community", "list" => $list, "hit" => $hit]);
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



