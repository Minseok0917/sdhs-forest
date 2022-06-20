
{
    const article = document.querySelector("article.content-container");
    article.id === "signup" ? signupPage() :
    article.id === "cuList" ? cuListPage() :
    article.id === "detail" ? detailPage() :
    article.id === "profile" ? profilePage() :
    ""
}

const returnSrc = (img) => {
    return new Promise( res => {
        const reader = new FileReader();
        reader.readAsDataURL(img);
        reader.onload = () => { res(reader.result) };
    } );
};


function signupPage() {
    const form = document.forms[0];
    const imgIpt = form.profileImg;
    
    const imgChangeHandle = async function(e) {
        if(this.value.substr(-3) !== "jpg") {
            alert("jpg만 선택 가능합니다.");
            this.value = "";
            return;
        };

        const src = await returnSrc(this.files[0]);
        form.base64Img.value = src;
        form.querySelector("img").src = src;
    };

    imgIpt.addEventListener("change", imgChangeHandle);
};

function cuListPage() {
    const form = document.forms[0];
    const photoContent = form.querySelector(".photo-content");
    const imgDeleteBtn = [...photoContent.querySelectorAll(".photo .img_delete")];
    const addBtn = photoContent.querySelector("button");

    const imgChangeHandle = function(){
        if(this.value.substr(-3) !== "jpg") {
            alert("jpg만 선택 가능합니다.");
            this.value = "";
            return
        }
    };

    const _addButton = function() {
        const ipt = document.createElement("input");
        ipt.type = "file";
        ipt.name = "list_img[]";
        ipt.multiple = true;
        ipt.addEventListener('change', imgChangeHandle);
        photoContent.appendChild(ipt);
    };

    const _imgDeletehandle = function() {
        this.parentElement.remove();
    };
    
    addBtn.addEventListener("click", _addButton);
    imgDeleteBtn.forEach( e => e.addEventListener("click", _imgDeletehandle) );
};


async function detailPage() {
    const likeBtn = document.querySelector(".like .like-btn");
    const list_sn = document.querySelector("#detail").dataset.sn;
    const heartChk = await fetch(`/checkHeart/${list_sn}`).then(res => res.json());
    if(heartChk.result) {
        likeBtn.classList.add("active");
        likeBtn.querySelector("i").className = "fa-solid fa-heart";
    }

    const _likeBtnClick = async function() {
        // const heart = this.querySelector("i");
        if(this.classList.contains("active")) {
            // 이미 좋아요 되어있을때
            const data = await fetch(`/deleteHeart/${list_sn}`).then(res => res.json());
            alert(data.msg);
            this.innerHTML = `<i class="fa-regular fa-heart"></i> ${data.heart_cnt}`;
        } else {
            // 좋아요가 안되어있을때
            const data = await fetch(`/addHeart/${list_sn}`).then(res => res.json());
            alert(data.msg);
            this.innerHTML = `<i class="fa-solid fa-heart"></i> ${data.heart_cnt}`;
        }
        this.classList.toggle("active");
    };

    likeBtn.addEventListener("click", _likeBtnClick);

    const comments = document.querySelector(".comments");
    const addCommBtn = document.querySelector(".add_comment");
    const addCommBtn2 = [...document.querySelectorAll(".add_comment2")];

    const _addCommentHandle = function(url) {
        comments.querySelector("form") ? comments.querySelector("form").remove() : "";

        const form = document.createElement("form");
        form.className = "comment_form flex";
        form.action = url;
        form.method = "post";
        form.innerHTML = `
            <input type="text" name="comment" class="content" placeholder="댓글내용을 입력해주세요.." required>
            <div class="btns flex">
                <button type="button" class="can_btn btn">취소</button>
                <input class="btn" type="submit" value="전송" />
            </div>
        `;
        comments.appendChild(form);

        form.querySelector("button.can_btn").addEventListener("click", function() { this.closest("form").remove() } );
    };

    addCommBtn.addEventListener("click", ()=>_addCommentHandle(`/addComment/${list_sn}`));
    addCommBtn2.forEach( e => e.addEventListener("click", (e)=>_addCommentHandle(`/addComment2/${list_sn}/${e.target.dataset.sn}`) ));
}

async function profilePage() {
    const id = document.querySelector(".profile-text #user_id").textContent;
    const writeList = await fetch(`/writeList/${id}`).then(res => res.json());
    
   
    
};

