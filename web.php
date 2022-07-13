<?php

$get(
    // view
    "/@View@home",
    "/profile/:id@View@profilePage",
    "/community@View@communityPage",
    "/login@View@loginPage",
    "/signup@View@signupPage",
    "/insertList@View@insertList",
    "/statusList/:list_sn@View@statusList",
    "/listDetail/:sn@Board@listDetail",

    // api
    "/addHeart/:list_sn@Api@addHeart",
    "/deleteHeart/:list_sn@Api@deleteHeart",
    "/checkHeart/:list_sn@Api@checkHeart",
    "/addWeekData/:list_sn@Api@addWeekData",

    // 로그아웃
    "/logout@User@logout",

    "/updateList/:sn@Board@updateList",
    "/deleteListPro/:sn@Board@deleteListPro",

    "/userList@View@userList",
);

$post(
    // 회원가입, 로그인
    "/signupPro@User@signupPro",
    "/loginPro@User@loginPro",
    
    // 게시글 작성, 수정
    "/insertListPro@Board@insertListPro",
    "/updateListPro@Board@updateListPro",

    // 댓글 달기
    "/addComment/:sn@Comment@addComment",
    "/addComment2/:list_sn/:comm_sn@Comment@addComment2",
);
