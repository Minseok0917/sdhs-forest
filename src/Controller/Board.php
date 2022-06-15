<?php
namespace src\Controller;

class Board
{
    function insertList()
    {
        view("/list/insertList", ["chk" => "community"]);
    }

    function insertListPro() 
    {
        [$list_title, $list_content, $owner] = post("list_title", "list_content", "owner");
        $imgTname = isset($_FILES["list_img"]) ? $_FILES["list_img"]["tmp_name"] : [];
        $count = fetch("SELECT `sn` FROM `list_tbl` ORDER BY `sn` DESC");
        $count = $count ? $count->sn+1 : 1;
        
        $resultText = "";
        for($i = 0; $i<count($imgTname); $i++) {
            $path = dirname(dirname(__DIR__))."/public/resource/img/BoardImg/".$count."_".($i+1).".jpg";
            move_uploaded_file($imgTname[$i], $path);
            $resultText .= $i === 0 ? $count."_".$i+1 : "&".$count."_".$i+1;
        }

        execute("INSERT INTO `list_tbl`(`list_title`, `list_content`, `list_img`, `owner`) VALUES(?, ?, ?, ?)", [$list_title, $list_content, $resultText, $owner]);

        move("/list/community", "글이 작성되었습니다.");
    }

    function listDetail($args) 
    {
        $sn = $args[1];
        $result = fetch("SELECT * FROM `list_tbl` WHERE `sn` = ?", [$sn]);
        $result->list_img = explode("&", $result->list_img);

        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";

        view("/list/listDetail", ["chk" => "community", "result" => $result]);
    }
}







