<main id="detailPost">
    <span class="title"><?= $title?></span>
    <span class="content"><?= $content?></span>
    <?php if(ss() && $writer == ss()->id):?>
        <button type="button" class="editBtn" onclick="location.href = '/editPost/<?= $idx?>'">수정</button>
        <button type="button" class="deleteBtn" onclick="location.href ='/deletePost/<?= $idx?>'">삭제</button>
        <button type="button" class="Btn">통계 페이지</button>
    <?php endif;?>
    <div>댓글</div>
    <span><?= $writer?></span>
    <input type="text" class="commentInput" required>
    <button type="button" class="writeBtn">작성</button>
    <div class="comments"></div>
</main>