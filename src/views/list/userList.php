    <article id="userList" class="content-container">
        <div class="content flex">
            <div class="sub-content flex">
                <div class="user-status">
                    <h3 class="title">유저 통계 리스트</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>유저 프로필 사진</th>
                                <th>유저 아이디</th>
                                <th>유저 이름</th>
                                <th>총 게시글 수</th>
                                <th>총 게시글 좋아요 수</th>
                                <th>총 게시글 댓글 수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result as $item): ?>
                                <tr>
                                    <td>
                                        <a href="/profile/<?=$item->user_id ?>">
                                            <div class="photo">
                                                <img src="/resource/img/profile/<?=$item->profile_img ?>.jpg" alt="">
                                            </div>
                                        </a>
                                    </td>
                                    <td><?=$item->user_id ?></td>
                                    <td><?=$item->user_name ?></td>
                                    <td><?=$item->list_count ?></td>
                                    <td><?=$item->heart_count ?></td>
                                    <td><?=$item->comment_count ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </article>
