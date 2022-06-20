<?php


$get(
    // view
    "/@View@home",
    "/profile/:id@View@profilePage",
    "/list/community@View@communityPage",
    "/login@View@loginPage",
    "/signup@View@signupPage",
    "/list/insertList@Board@insertList",
    "/listDetail/:sn@Board@listDetail",

    // api
    "/addHeart/:list_sn@Api@addHeart",
    "/deleteHeart/:list_sn@Api@deleteHeart",
    "/checkHeart/:list_sn@Api@checkHeart",
    "/writeList/:id@Api@writeList",

    // logout
    "/logout@User@logout",

    "/updateList/:sn@Board@updateList",
    "/deleteListPro/:sn@Board@deleteListPro",
);

$post(
    "/signupPro@User@signupPro",
    "/loginPro@User@loginPro",
    
    "/insertListPro@Board@insertListPro",
    "/updateListPro@Board@updateListPro",

    "/addComment/:sn@Comment@addComment",
    "/addComment2/:list_sn/:comm_sn@Comment@addComment2",
);
