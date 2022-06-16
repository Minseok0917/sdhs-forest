<?php


$get(
    "/@View@home",
    "/profile/:id@View@profilePage",
    "/list/community@View@communityPage",
    "/login@View@loginPage",
    "/signup@View@signupPage",
    "/list/insertList@Board@insertList",
    
    "/listDetail/:sn@Board@listDetail",

    "/addHeart/:list_sn@Api@addHeart",
    "/deleteHeart/:list_sn@Api@deleteHeart",
    "/checkHeart/:list_sn@Api@checkHeart",

    "/logout@User@logout",
);

$post(
    "/signupPro@User@signupPro",
    "/loginPro@User@loginPro",
    
    "/insertListPro@Board@insertListPro",
);

