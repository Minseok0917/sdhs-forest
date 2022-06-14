<?php
namespace src\Controller;

class Board
{
    function insertListPro() 
    {
        // [$list_title, $list_content] = post("list_title, list_content");
        $list_title = $_POST["list_title"];
        $list_content = $_POST["list_content"];
        $imgTname = $_FILES["list_img"]["tmp_name"];
        $imgName = $_FILES["list_img"]["name"];
        $count = fetch("SELECT `sn` FROM `list_tbl` ORDER BY `sn` DESC");
        $count = $count ? $count+1 : 1;
        echo "<pre>";

        $resultText = "";
        for($i = 0; $i<count($imgTname); $i++) {
            // $path = "/resource/img/BoardImg/".$count."_".($i+1);
            var_dump($imgName[$i]);
            // var_dump($path);
            move_uploaded_file($imgTname[$i], "/resource/img/BoardImg/".$imgName[$i]);
            // $resultText .= $i === 0 ? $count."_".$i+1 : "&".$count."_".$i+1;
        }
        echo "<br>";
        var_dump($resultText);

        echo "</pre>";

        // echo $list_title;
        // echo $list_content;

        // foreach($imgs as $i) {
        //     // 
        //     echo "<pre>";
        //     var_dump($i);
        //     echo "</pre>";
        // }
    }
}







