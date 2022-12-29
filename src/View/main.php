    <main>
        <h1>메인 페이지</h1>
        <div>
            <button type="button" onclick="location.href = '/createPost'">게시글 생성</button>
        </div>
        <?php foreach($data as $item): ?>
            <div onclick="location.href = '/detailPost/<?= $item->idx?>'">
                <?=$item->writer ?>
                <?=$item->title ?>
                <?=$item->content ?>
            </div>
        <?php endforeach; ?>
    </main>