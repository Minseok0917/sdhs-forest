<?php
namespace src\Controller;

class Board
{
    function insertList()
    {
        view("/insertList", ["chk" => "community"]);
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

        move("/community", "글이 작성되었습니다.");
    }

    function listDetail($args) 
    {
        move("/listDetail");
    }
}







