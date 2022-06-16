    <article id="detail" class="content-container" data-sn="<?=$result->sn ?>">
        <div class="content flex">
            <div class="sub-content flex">
                <div class="detail">
                    <div class="title flex">
                        <h3><?=$result->list_title ?></h3>
                        <span><?=$result->list_date ?></span>
                    </div>
                    
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
                    <div class="like flex">
                        <button class="like-btn <?=$result->user_id ? "active": "" ?>">
                            <i class="fa-regular fa-heart"></i> 좋아요
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </article>
