    <main id="main">
        <h1>메인 페이지</h1>
        <div>
            <button type="button" onclick="location.href = '/createPost'">게시글 생성</button>
        </div>
        <?php foreach($data as $item): ?>
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
        <?php endforeach; ?>
        <script>
            const idx = <?=$item->idx ?>;
        </script>
    </main>