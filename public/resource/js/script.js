
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


function detailPage() {
    const heart = document.querySelector(".like>h3");

    const _heartClick = function() {
        console.log(1);

    };

    heart.addEventListener("click", _heartClick);
}



