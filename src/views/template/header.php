<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="/resource/bootstrap-5.1.3-dist/css/bootstrap.css"> -->
    <link rel="stylesheet" href="/resource/css/style.css">
</head>
<body>
    <div id="app" class="flex">
        <header class="flex">
            <div class="header-container flex">
                <div class="title flex">
                    <div class="logo">
                        <i class="fa-solid fa-font-awesome"> LOGO</i>
                    </div>
                    <nav class="menu">
                        <ul class="flex">
                            <li class="<?=$chk == "community" ? "active" : "" ?>" >
                                <a href="/community"><i class="fa-solid fa-bullhorn"></i>COMMUNITY</a>
                            </li>
                            <?php if(!user()): ?>
                                <li class="<?=$chk == "login" ? "active" : "" ?>" >
                                    <a href="/login"><i class="fa-solid fa-right-to-bracket"></i>LOGIN</a>
                                </li>
                                <li class="<?=$chk == "signup" ? "active" : "" ?>" >
                                    <a href="/signup"><i class="fa-solid fa-user-plus"></i>Sign Up</a>
                                </li>
                            <?php else: ?> 
                                <li class="<?=$chk == "profile" ? "active" : "" ?>" >
                                    <a href="/profile/<?=user()->user_id ?>"><i class="fa-solid fa-address-card"></i>PROFILE</a>
                                </li>
                            <?php endif; ?> 
                        </ul>
                    </nav>
                </div>
                <!-- <div class="subImg">
                    <img src="/resource/img/restImg/headerImg.jpg" alt="subImg" title="subImg">
                </div> -->
            </div>
        </header>
        <section class="container">
            <nav class="util-menu">
                <ul class="flex">
                    <?php if(user()): ?>
                        <li class="logout"><a href="/logout">로그아웃</a></li>
                        <li><i class="fa-solid fa-bell"></i></li>
                        <li class="profile">
                            <a href="/profile/<?=user()->user_id ?>"><img src="/resource/img/profile/<?=user()->profile_img ?>.jpg" alt="profile" title="profile"></a>
                        </li>
                    <?php else: ?>
                        <li><i class="fa-solid fa-bell"></i></li>
                    <?php endif; ?>
                </ul>
            </nav>
