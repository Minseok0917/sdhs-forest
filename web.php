<?php
$get (
    '/@View@main',
    '/test/:id@View@test',
    '/register@View@register',
    '/login@View@login',
    '/profile/:idx@View@profile',
);

$post (
    '/register@User@register',
    '/login@User@login',
);