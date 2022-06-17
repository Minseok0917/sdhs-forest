

    <article id="profile" class="content-container">
        <div class="content flex">
            <div class="sub-content">
                <div class="profile flex">
                    <h3 class="title">Profile</h3>
                    <div class="profiles grid">
                        <div class="profile-img">
                            <img src="/resource/img/profile/<?=$thisUser->profile_img ?>.jpg" alt="">
                        </div>
                        <div class="profile-text flex">
                            <div class="profile-id">
                                <h3>아이디</h3>
                                <p id="user_id"><?=$thisUser->user_id ?></p>
                            </div>
                            <div class="profile-name">
                                <h3>이름</h3>
                                <p><?=$thisUser->user_name ?></p>
                            </div>
                            <?php if($thisUser->user_name === user()->user_name): ?>
                                <button class="btn"><a href="/list/insertList">Create more</a></button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <input type="radio" name="profile_tab" id="write_list" checked>
                    <input type="radio" name="profile_tab" id="like_list">
                    <div class="labels">
                        <label for="write_list">작성한 게시글 보기</label>
                        <label for="like_list">좋아요한 게시글 보기</label>
                    </div>
    
                    <div class="write_list list-container flex">
                        <!-- <div class="item">
                            <div class="container flex">
                                    <div class="photo">
                                        <img src="/resource/img/BoardImg/.jpg" alt="">
                                    </div>
                                <div class="text flex">
                                    <h4 class="title">title</h4>
                                    <p>Owner: name</p>
                                </div>
                            </div>
                            <div class="util flex">
                                <p class="like"><i class="fa-solid fa-heart"></i> 0</p>
                                <p class="read"><i class="fa-regular fa-eye"></i> 0</p>
                                <botton class="btn"><a href="/listDetail/">Read more</a></botton>
                            </div>
                        </div> -->
                    </div>
                    
                    <div class="like_list">
    
                    </div>
                </div>
            </div>
        </div>
    </article>