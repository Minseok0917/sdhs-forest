
    <article id="statusList" class="content-container">
        <div class="content flex">
            <div class="sub-content flex">
                <div class="list-status">
                    <h3 class="title">게시글 통계 페이지 <span>#<?=$acc_count->list_sn ?></span></h3>
                    <div class="counts flex">
                        <div class="acc_count count flex">
                            <h3>전체 방문자 수</h3>
                            <p><?=$acc_count->acc_count ?>명</p>
                        </div>
                        <div class="day_count count flex">
                            <h3>오늘 방문자 수</h3>
                            <p><?=$day_count->day_count ?>명</p>
                        </div>
                    </div>
                    <div class="graph">
                        <canvas data-sn="<?=$acc_count->list_sn ?>"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </article>
