const interButtonUp = document.querySelector('.button-inter .inter')
const blockInterUp = document.querySelector('.section--option')


interButtonUp.addEventListener(
    'click',
    ()=>
    {
        interButtonUp.classList.toggle('up')
        blockInterUp.classList.toggle('active')
    }
)