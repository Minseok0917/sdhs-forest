<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <button type="button" onclick="location.href='/'">홈</button>
        <?php if(ss()):?>
            <button type="button" onclick="location.href = '/profile/<?= ss()->name?>'">프로필</button>
            <button type="button" onclick="location.href = '/logout'">로그아웃</button>
        <?php else:?>
            <button type="button" onclick="location.href = '/register'">회원가입</button>
            <button type="button" onclick="location.href = '/login'">로그인</button>
        <?php endif;?>
    </header>