const mainId = document.querySelector('main').id;
mainId === 'main' ? mainPage() :
mainId === 'detailPost' ? detailPost() :
mainId;

function mainPage() {
    const likeBtn = document.querySelector('.likeBtn');
    
    const getData = async () => {
        const likeCnt = document.querySelector('.likeCnt');
        let data = await fetch(`/getData/${likeCnt.innerText}`).then(res => res.json());
        console.log(data);
    }
    
    const handleLikeBtnClick = async e => {
        e.stopPropagation();
        getData();
    }
    likeBtn.addEventListener('click', handleLikeBtnClick);
}

function detailPost() {
    const data = {
        comments: []
    }
    
    const commentInput = document.querySelector('.commentInput');
    const writeBtn = document.querySelector('.writeBtn');
    const handleWriteBtnClick = () => {
        data.comments = [
            ...data.comments,
            {
                comment: commentInput.value,
                nestedComments: []
            }
        ];
        console.log(data);
    }
    writeBtn.addEventListener('click', handleWriteBtnClick);
}