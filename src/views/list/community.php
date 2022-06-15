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
                    <?php foreach($list as $item): ?>
                        <div class="item">
                            <div class="container flex">
                                <div class="photo">
                                    <img src="/resource/img/restImg/headerImg.jpg" alt="">
                                </div>
                                <div class="text flex">
                                    <h4 class="title"><?=$item->list_title ?></h4>
                                    <p>Owner: <?=$item->owner ?></p>
                                </div>
                            </div>
                            <div class="util flex">
                                <p class="like"><i class="fa-solid fa-heart"></i> 0</p>
                                <p class="read"><i class="fa-regular fa-eye"></i> 0</p>
                                <botton class="btn"><a href="/listDetail/<?=$item->sn ?>">Read more</a></botton>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </article>
