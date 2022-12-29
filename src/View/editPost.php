<main>
    <form action="/editPost/<?= $idx?>" method="post">
        <p><input type="text" name="title" placeholder="게시글 제목"></p>
        <p><textarea name="content" placeholder="게시글 내용" rows="5" cols="30"></textarea></p>
        <button type="submit">게시글 수정</button>
    </form>
</main>