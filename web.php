<?php


$get(
    "/@View@home",
    "/profile/:id@View@profilePage",
    "/list/community@View@communityPage",
    "/login@View@loginPage",
    "/signup@View@signupPage",
    "/list/insertList@Board@insertList",
    
    "/listDetail/:sn@Board@listDetail",

    "/logout@User@logout",
);

$post(
    "/signupPro@User@signupPro",
    "/loginPro@User@loginPro",
    
    "/insertListPro@Board@insertListPro",
);

