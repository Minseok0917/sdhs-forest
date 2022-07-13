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
        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json; charset=UTF-8");
        $list_sn = $args[1];
        $resultArr = (object)[];
        
        $result = fetch("SELECT * FROM `heart_tbl` WHERE `user_id` = ? AND `list_sn` = ?", [user()->user_id, $list_sn]);
        
        if($result) {
            $resultArr->result = 1;
        } else {
            $resultArr->result = 0;
        }
        
        echo json_encode($resultArr);
    }

    function addWeekData($args)
    {
        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json; charset=UTF-8");
        $list_sn = $args[1];
        $week_data = [];

        for($i = 6; $i>=0; $i--) {
            $date = date("Y-m-d", strtotime(date("Y-m-d")." -$i day "));
            $result = fetch("SELECT * FROM `hits_tbl` WHERE `hit_date` = ? AND `list_sn` = ?", [$date, $list_sn]);
            $returnData = (object)[];
            $returnData->date = $date;
            $returnData->count = isset($result->count) ? $result->count : 0;
            array_push($week_data, $returnData);
        }
        
        echo json_encode($week_data);
    }
    
}



