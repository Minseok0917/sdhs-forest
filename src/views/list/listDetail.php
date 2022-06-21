    <article id="detail" class="content-container" data-sn="<?=$result->sn ?>">
        <div class="content flex">
            <div class="sub-content flex">
                <div class="detail">
                    <div class="owner flex">
                        <a href="/profile/<?=$result->owner ?>">
                            <div class="profile flex">
                                <div class="photo">
                                    <img src="/resource/img/profile/<?=$result->profile ?>.jpg" alt="">
                                </div>
                                <h4><?=$result->owner ?></h4>
                            </div>
                        </a>
                        <?php if(user()->user_id === $result->owner): ?>
                            <div class="btns">
                                <button class="btn" onclick="location.replace('/statusList/<?=$result->sn ?>')">게시글 통계 보기</button>
                                <button class="btn" onclick="location.replace('/updateList/<?=$result->sn ?>')">수정하기</button>
                                <button class="btn" onclick="location.replace('/deleteListPro/<?=$result->sn ?>')">삭제하기</button>
                            </div>
                        <?php endif; ?>
                    </div>
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
                            <i class="fa-regular fa-heart"></i> <?=$result->heart_cnt ?>
                        </button>
                    </div>
                    <div class="comments">
                        <?php foreach($comments as $comm): ?>
                            <div class="comment flex">
                                <div class="c_photo">
                                    <img src="/resource/img/profile/<?=$comm->profile_img ?>.jpg" alt="">
                                </div>
                                <div class="text flex">
                                    <p class="owner"><?=$comm->owner ?> <span class="date"><?=$comm->comments_date ?></span></p>
                                    <div class="content flex">
                                        <p><?=$comm->comments ?></p>
                                        <button class="add_comment2 btn" data-sn="<?=$comm->sn ?>">댓글달기</button>
                                    </div>
                                </div>
                            </div>
                            <?php foreach($comments2 as $comm2): ?>
                                <?php if($comm2->parent_sn === $comm->sn): ?>
                                    <div class="sub_comment comment flex">
                                        <div class="c_photo">
                                            <img src="/resource/img/profile/<?=$comm2->profile_img ?>.jpg" alt="">
                                        </div>
                                        <div class="text flex">
                                            <p class="owner"><?=$comm2->owner ?> <span class="date"><?=$comm2->comments_date ?></span></p>
                                            <div class="content flex">
                                                <p><?=$comm2->comments ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                    <button class="add_comment btn">댓글달기</button>
                </div>
            </div>
        </div>
    </article>
