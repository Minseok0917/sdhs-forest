<?php
namespace src\Controller;

class Comment
{
    function addComment($args)
    {
        $list_sn = $args[1];
        $comment = $_POST["comment"];

        $result = execute("INSERT INTO `comments_tbl`(`list_sn`, `owner`, `deep`, `comments`) VALUES (?, ?, ?, ?)", [$list_sn, user()->user_id, 1, $comment]);

        if($result) {
            move("/listDetail/$list_sn", "댓글이 작성되었습니다.");
        }
    }
    
    function addComment2($args)
    {

        $list_sn = $args[1];
        $comm_sn = $args[2];
        $comment = $_POST["comment"];
        
        $result = execute("INSERT INTO `comments_tbl`(`list_sn`, `owner`, `deep`, `comments`, `parent_sn`) VALUES (?, ?, ?, ?, ?)", [$list_sn, user()->user_id, 1, $comment, $comm_sn]);

        if($result) {
            move("/listDetail/$list_sn", "댓글이 작성되었습니다.");
        }
    }
}





