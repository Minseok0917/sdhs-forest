<?php
$get (
    '/@View@main',
    '/register@View@register',
    '/login@View@login',
    '/logout@User@logout',
    '/profile/:name@View@profile',
    '/createPost@View@createPost',
    '/detailPost/:idx@View@detailPost',
    '/editPost/:idx@View@editPost',
    '/deletePost/:idx@View@deletePost',
    '/getData/:idx@View@getData',
    '/writeComment@View@writeComment',
);

$post (
    '/register@User@register',
    '/login@User@login',
    '/createPost@View@createPostCtrl',
    '/editPost/:idx@View@editPostCtrl',
);