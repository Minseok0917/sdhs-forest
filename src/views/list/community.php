    <article id="community" class="content-container">
        <div class="content flex">
            <div class="sub-content flex">
                <div class="main_img">
                    <img src="/resource/img/restImg/mainImg.jpg" alt="">
                    <div class="text">
                        <h2>COMMUNITY</h2>
                    </div>
                </div>
                <div class="create-btn">
                    <button class="btn"><a href="/list/insertList">Create more</a></button>
                </div>
                <div class="item-container flex">
                    <?php for($i = 0; $i<count($list); $i++): ?>
                        <div class="item">
                            <div class="container flex">
                                <?php if($list[$i]->list_img !== ""): ?>
                                    <div class="photo">
                                        <img src="/resource/img/BoardImg/<?=$list[$i]->list_img ?>.jpg" alt="">
                                    </div>
                                <?php endif; ?>
                                <div class="text flex">
                                    <h4 class="title"><?=$list[$i]->list_title ?></h4>
                                    <p>Owner: <?=$list[$i]->owner ?></p>
                                </div>
                            </div>
                            <div class="util flex">
                                <p class="like"><i class="fa-solid fa-heart"></i> <?=$list[$i]->heart_count ?></p>
                                <p class="read"><i class="fa-regular fa-eye"></i> <?=$hit[$i]->hit_count ?></p>
                                <botton class="btn"><a href="/listDetail/<?=$list[$i]->sn ?>">Read more</a></botton>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </article>
