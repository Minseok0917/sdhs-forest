<?php

$get(
    "/@View@index",
    "/signup@View@signup",
    "/login@View@login",
    "/logout@User@logout",
);

$post(
    "/user/signup@User@signup",
    "/user/login@User@login",
);



