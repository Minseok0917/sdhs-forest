const mainId = document.querySelector('main').id;
mainId === 'main' ? mainPage() : mainId;

function mainPage() {
    const likeBtn = document.querySelector('.likeBtn');
    
    const getData = async () => {
        const likeCnt = document.querySelector('.likeCnt');
        let data = await fetch(`/getData/${likeCnt.innerText}`).then(res => res.json());
        console.log(data);
    }
    
    const handleLikeBtnClick = e => {
        e.stopPropagation();
        getData();
    }
    likeBtn.addEventListener('click', handleLikeBtnClick);
}