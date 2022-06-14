<?php


$get(
    "/@View@home",
    "/profile/:id@View@profilePage",
    "/community@View@communityPage",
    "/login@View@loginPage",
    "/signup@View@signupPage",
    "/insertList@View@insertList",

    "/logout@User@logout",
);

$post(
    "/signupPro@User@signupPro",
    "/loginPro@User@loginPro",
    
    "/insertListPro@List@insertListPro",
);

