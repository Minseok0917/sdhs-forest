
    <article class="content-container">
        <div class="profile flex">
            <h3 class="title">Profile</h3>
            <div class="profiles grid">
                <div class="profile-img">
                    <img src="/resource/img/profile/<?=$thisUser->profile_img ?>.jpg" alt="">
                </div>
                <div class="profile-text flex">
                    <div class="profile-id">
                        <h3>아이디</h3>
                        <p><?=$thisUser->user_id ?></p>
                    </div>
                    <div class="profile-name">
                        <h3>이름</h3>
                        <p><?=$thisUser->user_name ?></p>
                    </div>
                    <?php if($thisUser->user_name === user()->user_name): ?>
                        <button>게시글 생성</button>
                    <?php endif; ?>
                </div>
            </div>
            <!-- <input type="radio" name="profile_tab" id="write_list" checked>
            <input type="radio" name="profile_tab" id="like_list">
            <div class="labels">
                <label for="write_list">작성한 게시글 보기</label>
                <label for="like_list">좋아요한 게시글 보기</label>
            </div>

            <div class="write_list">

            </div>
             
            <div class="like_list">

            </div> -->






            
        </div>
    </article>
