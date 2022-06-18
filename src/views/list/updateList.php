
    <article id="cuList" class="content-container">
        <div class="content flex">
            <div class="sub-content">
                <h3 class="title">Update List</h3>
                <form action="/updateListPro" method="post" enctype="multipart/form-data" class="cuForm flex">
                    <input type="hidden" name="owner" value="<?=$result->owner ?>" />
                    <input type="hidden" name="sn" value="<?=$result->sn ?>" />
                    <div class="form_title flex">
                        <h5>title</h5>
                        <input type="text" name="list_title" value="<?=$result->list_title ?>" placeholder="제목을 입력해주세요" required>
                    </div>
                    <div class="form_content flex">
                        <h5>content</h5>
                        <textarea name="list_content" placeholder="내용을 입력해주세요" required><?=$result->list_content ?></textarea>
                    </div>
                    <div class="photo-content flex">
                        <div class="add_btn">
                            <button type="button" class="btn">사진추가</button>
                        </div>
                        <?php foreach($result->list_img as $img): ?>
                            <div class="photo flex">
                                <input type="hidden" name="default_img[]" value="<?=$img ?>" />
                                <img src="/resource/img/BoardImg/<?=$img ?>.jpg" alt="">
                                <button type="button" class="btn img_delete">이미지 삭제</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="btns flex">
                        <input type="submit" value="Writing" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </article>


