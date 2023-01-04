<main>
    <h1>프로필 페이지</h1>
    <div>아이디: <?=$id ?></div>
    <div>이름: <?=$name ?></div>
    <?php if(ss()->id == $id):?>
        <button type="button" onclick="location.href = '/createPost'">게시글 생성</button>
        <h3>작성한 글</h3>
        <?php foreach($post as $item):?>
            <div onclick="location.href = '/detailPost/<?= $item->idx?>'">
                    <?=$item->writer ?>
                    <?=$item->title ?>
                    <?=$item->content ?>
                    <button type="button" class="likeBtn">좋아요</button>
                    <span class="likeCnt"><?=$item->likeCnt ?></span>
                    <?=$item->commentsCnt ?>
                    <?=$item->totalVisitors ?>
                    <?=$item->dailyVisitors ?>
                    <?=$item->weeklyVisitors ?>
                </div>
        <?php endforeach;?>
    <?php endif;?>
</main>