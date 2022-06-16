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
        $resultArr->msg = "좋아요가 반영되었습니다.";
        
        echo json_encode($resultArr);
    }
    
    function deleteHeart($args)
    {
        $list_sn = $args[1];
        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json; charset=UTF-8");
        $resultArr = (object)[];
        
        $result = execute("DELETE FROM `heart_tbl` WHERE `user_id` = ? AND `list_sn` = ?", [user()->user_id, $list_sn]);
        
        $resultArr->msg = "좋아요가 취소되었습니다.";
        
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
    
}



