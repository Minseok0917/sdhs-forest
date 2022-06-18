<?php
namespace src\Controller;

class Api
{
    function addHeart($args)
    {
        $list_sn = $args[1];
        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json; charset=UTF-8");
        $resultArr = (object)[];
        
        $result = execute("INSERT INTO `heart_tbl` VALUES(?, ?)", [user()->user_id, $list_sn]);
        $heart = fetch("SELECT COUNT(`user_id`) as `heart_cnt` FROM `heart_tbl` WHERE `list_sn` = ?", [$list_sn]);

        $resultArr->msg = "좋아요가 반영되었습니다.";
        $resultArr->heart_cnt = $heart->heart_cnt;
        
        echo json_encode($resultArr);
    }
    
    function deleteHeart($args)
    {
        $list_sn = $args[1];
        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json; charset=UTF-8");
        $resultArr = (object)[];
        
        $result = execute("DELETE FROM `heart_tbl` WHERE `user_id` = ? AND `list_sn` = ?", [user()->user_id, $list_sn]);
        $heart = fetch("SELECT COUNT(`user_id`) as `heart_cnt` FROM `heart_tbl` WHERE `list_sn` = ?", [$list_sn]);

        $resultArr->msg = "좋아요가 취소되었습니다.";
        $resultArr->heart_cnt = $heart->heart_cnt;
        
        echo json_encode($resultArr);
    }

    function checkHeart($args)
    {
        $list_sn = $args[1];
        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json; charset=UTF-8");
        $resultArr = (object)[];
        
        $result = fetch("SELECT * FROM `heart_tbl` WHERE `user_id` = ? AND `list_sn` = ?", [user()->user_id, $list_sn]);
        
        if($result) {
            $resultArr->result = 1;
        } else {
            $resultArr->result = 0;
        }
        
        echo json_encode($resultArr);
    }

    function writeList($args) {
        $id = $args[1];
        header("HTTP//1.0 200");
        header("content-type: application/json; charset=utf-8");
        $resultArr = (object)[];

        $write = fetchAll("SELECT lt.sn, lt.list_title, lt.list_img, lt.owner, count(ht.user_id) as `heart_count` FROM `list_tbl` as `lt` LEFT OUTER JOIN `heart_tbl` as `ht` on lt.sn = ht.list_sn WHERE `owner` = ? GROUP BY `sn`", [$id]);
        
        foreach($write as $w) {
            $w->list_img = $w->list_img === "" ? [] : explode("&", $w->list_img);
        }
        $resultArr->listArr = $write;

        echo json_encode($resultArr);
    }
    
}



