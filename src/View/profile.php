<main>
    <h1>프로필 페이지</h1>
    <div>아이디: <?=$id ?></div>
    <div>이름: <?=$name ?></div>
    <?php if(ss()->id == $id):?>
        <button type="button" onclick="location.href = '/createPost'">게시글 생성</button>
    <?php endif;?>
    <?= var_dump($post)?>
</main>