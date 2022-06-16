<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link>
</head>
<body>
    <?php if(ss()) :?>    
        <img src="/upload/<?=$_SESSION['user']->profile?>" alt="">
        <h2><?= $_SESSION['user']->name ?></h2>
    <?php endif;?>

