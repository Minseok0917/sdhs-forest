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
        $hit = fetchAll("SELECT lt.sn, ifnull(sum(hit.count), 0) as `hit_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `hits_tbl` as `hit` on lt.sn = hit.list_sn GROUP BY lt.sn ORDER BY lt.sn desc");

        $write = fetchAll("SELECT lt.sn, lt.list_title, lt.list_img, lt.owner, count(ht.user_id) as `heart_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `heart_tbl` as `ht` on lt.sn = ht.list_sn WHERE `owner` = ? GROUP BY `sn`", [$user_id]);
        $like = fetchAll("SELECT lt.sn, lt.list_title, lt.list_img, lt.owner, count(ht.user_id) as `heart_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `heart_tbl` as `ht` on lt.sn = ht.list_sn WHERE ht.user_id = ? GROUP BY `sn`", [$user_id]);
        
        foreach($write as $w) {
            $w->list_img = $w->list_img === "" ? "" : explode("&", $w->list_img)[0];
        }

        foreach($like as $l) {
            $l->list_img = $l->list_img === "" ? "" : explode("&", $l->list_img)[0];
        }

        foreach($hit as $h) {
            foreach($write as $w) {
                if($h->sn === $w->sn) {
                    $w->hit_count = $h->hit_count;
                }
            }
            foreach($like as $l) {
                if($h->sn === $l->sn) {
                    $l->hit_count = $h->hit_count;
                }
            }
        }

        view("/user/profile", ["chk" => "profile", "thisUser" => $user, "write" => $write, "like" => $like]);
    }
    
    function communityPage()
    {
        loginChk();

        // join을 못해서 쿼리 2개 만듦
        $list = fetchAll("SELECT lt.sn, lt.list_title, lt.list_img, lt.owner, count(ht.user_id) as `heart_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `heart_tbl` as `ht` on lt.sn = ht.list_sn GROUP BY `sn` order by `sn` desc");
        $hit = fetchAll("SELECT lt.sn, ifnull(sum(hit.count), 0) as `hit_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `hits_tbl` as `hit` on lt.sn = hit.list_sn GROUP BY lt.sn ORDER BY lt.sn desc");

        foreach($list as $l) {
            foreach($hit as $h) {
                if($l->sn === $h->sn) {
                    $l->hit_count = $h->hit_count;
                }
            }
        }

        foreach($list as $i) {
            $i->list_img = $i->list_img === "" ? "" : explode("&", $i->list_img)[0];
        }

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

    function insertList()
    {
        view("/list/insertList", ["chk" => "community"]);
    }

    function statusList($args)
    {
        $list_sn = $args[1];
        $acc_count = fetch("SELECT `list_sn`, sum(`count`) as `acc_count` FROM `hits_tbl` WHERE `list_sn` = ? group by `list_sn`", [$list_sn]);
        $day_count = fetch("SELECT `list_sn`, sum(`count`) as `day_count` FROM `hits_tbl` WHERE `list_sn` = ? AND `hit_date` = ?", [$list_sn, date("Y-m-d")]);

        // echo "<pre>";
        // var_dump($acc_count);
        // var_dump($day_count);
        // echo "</pre>";

        view("/list/statusList", ["chk" => "community", "acc_count" => $acc_count, "day_count" => $day_count]);
    }
    
    function userList()
    {
        $result = fetchAll("SELECT ut.user_id, ut.user_name, ut.profile_img, ifnull(count(lt.owner), 0) as `list_count` FROM `user_tbl` as `ut` LEFT OUTER JOIN `list_tbl` as `lt` on ut.user_id = lt.owner WHERE ut.user_id !='admin' GROUP BY ut.user_id");
        $like = fetchAll("SELECT lt.owner, count(ht.user_id) `heart_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `heart_tbl` as `ht` on lt.sn = ht.list_sn GROUP BY lt.owner");
        $comment = fetchAll("SELECT lt.owner, count(ct.comments) as `comment_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `comments_tbl` as `ct` on lt.sn = ct.list_sn GROUP BY lt.owner");

        foreach($result as $r) {
            foreach($like as $l) {
                if($r->user_id === $l->owner) {
                    $r->heart_count = $l->heart_count;
                }
            }
            foreach($comment as $c) {
                if($c->owner === $r->user_id) {
                    $r->comment_count = $c->comment_count;
                }
            }
        }
        

        foreach($result as $r) {
            $r->heart_count = isset($r->heart_count) ? $r->heart_count : 0;
            $r->comment_count = isset($r->comment_count) ? $r->comment_count : 0;
        }


        view("/list/userList", ["chk" => "userlist", "result" => $result]);
    }
}



