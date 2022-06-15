    <article id="detail" class="content-container">
        <div class="content flex">
            <div class="sub-content flex">
                <div class="detail">
                    <h3 class="title">
                        <?=$result->list_title ?>
                    </h3>
                    <div class="text">
                        <p><?=$result->list_content ?></p>
                    </div>
                    <div class="photo-container grid">
                        <?php foreach($result->list_img as $img): ?>
                            <div class="item">
                                <img src="/resource/img/BoardImg/<?=$img ?>.jpg" alt="img" title="img">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="like">
                        <h3><i class="fa-regular fa-heart"></i> 좋아요</h3>
                        <!-- <i class="fa-solid fa-heart"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </article>
