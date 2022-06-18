
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
}

async function profilePage() {
    // console.log(1);
    const id = document.querySelector(".profile-text #user_id").textContent;
    const writeList = await fetch(`/writeList/${id}`).then(res => res.json());
    
    const wList = document.querySelector(".write_list");
    const lList = document.querySelector(".like_list");
    
    writeList.listArr.forEach( ele => {
        const item = document.createElement("div");
        item.className = "item";
        item.innerHTML = `
            <div class="container flex">
                    <div class="photo">
                        <img src='/resource/img/BoardImg/${ele.list_img[0]}.jpg' alt=''>
                    </div>
                <div class="text flex">
                    <h4 class="title">${ele.list_title}</h4>
                    <p>Owner: ${ele.owner}</p>
                </div>
            </div>
            <div class="util flex">
                <p class="like"><i class="fa-solid fa-heart"></i> ${ele.heart_count}</p>
                <p class="read"><i class="fa-regular fa-eye"></i> 0</p>
                <botton class="btn"><a href="/listDetail/${ele.sn}">Read more</a></botton>
            </div>
        `;
        wList.appendChild(item);
        
    } )
    


    console.log(writeList.listArr);
    
};

