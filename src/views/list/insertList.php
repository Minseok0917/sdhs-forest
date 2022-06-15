
    <article id="insertList" class="content-container">
        <div class="content flex">
            <div class="sub-content">
                <h3 class="title">Insert List</h3>
                <form action="/insertListPro" method="post" enctype="multipart/form-data" class="insertForm flex">
                    <input type="hidden" name="owner" value="<?=user()->user_id ?>" />
                    <div class="form_title flex">
                        <h5>title</h5>
                        <input type="text" name="list_title" placeholder="제목을 입력해주세요" required>
                    </div>
                    <div class="form_content flex">
                        <h5>content</h5>
                        <textarea name="list_content" placeholder="내용을 입력해주세요" required></textarea>
                    </div>
                    <div class="photo-content flex">
                        <div class="add_btn">
                            <button type="button" class="btn">사진추가</button>
                        </div>
                    </div>
                    <div class="btns flex">
                        <input type="submit" value="Writing" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </article>


