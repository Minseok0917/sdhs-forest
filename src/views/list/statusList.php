
    <article id="community" class="content-container">
        <div class="content flex">
            <div class="sub-content flex">
                <div class="list-status">
                    <h3 class="title">게시글 통계 페이지 <span>#<?=$acc_count->list_sn ?></span></h3>
                    <div class="counts flex">
                        <div class="acc_count flex">
                            <h3>게시글 전체 방문자 수</h3>
                            <p><?=$acc_count->acc_count ?></p>
                        </div>
                        <div class="day_count flex">
                            <h3>일일 방문자 수</h3>
                            <p><?=$day_count->day_count ?></p>
                        </div>
                    </div>
                    <div class="graph">
                        
                    </div>
                </div>
            </div>
        </div>
    </article>
