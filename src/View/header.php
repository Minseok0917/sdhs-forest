<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link>
</head>
<body>
    <p><a href="/">HOME</a></p>
    <?php if(ss()) :?>    
        <img src="/upload/<?=$_SESSION['user']->profile?>" alt="">
        <h2><?= $_SESSION['user']->name ?></h2>
        <p><a href="/logout">로그아웃</a></p>
    <?php else :?>
        <p><a href="/login">로그인</a></p>
        <p><a href="/signup">회원가입</a></p>
    <?php endif ;?>