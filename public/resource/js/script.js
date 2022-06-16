
{
    const article = document.querySelector("article.content-container");
    article.id === "signup" ? signupPage() :
    article.id === "insertList" ? insertListPage() :
    article.id === "detail" ? detailPage() :
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

function insertListPage() {
    const form = document.forms[0];
    const photoContent = form.querySelector(".photo-content");
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

    addBtn.addEventListener("click", _addButton);
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
        const heart = this.querySelector("i");
        if(this.classList.contains("active")) {
            // 이미 좋아요 되어있을때
            const data = await fetch(`/deleteHeart/${list_sn}`).then(res => res.json());
            alert(data.msg);
            heart.className = "fa-regular fa-heart";
        } else {
            // 좋아요가 안되어있을때
            const data = await fetch(`/addHeart/${list_sn}`).then(res => res.json());
            alert(data.msg);
            heart.className = "fa-solid fa-heart";
        }
        this.classList.toggle("active");
    };

    likeBtn.addEventListener("click", _likeBtnClick);
}



