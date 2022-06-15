<?php


$get(
    "/@View@home",
    "/profile/:id@View@profilePage",
    "/community@View@communityPage",
    "/login@View@loginPage",
    "/signup@View@signupPage",
    "/insertList@Board@insertList",
    
    "/listDetail/:sn@Board@listDetail",

    "/logout@User@logout",
);

$post(
    "/signupPro@User@signupPro",
    "/loginPro@User@loginPro",
    
    "/insertListPro@Board@insertListPro",
);

