const itemsMenu = document.querySelectorAll('.admin--menu nav ul li a')
const asideMenu = document.querySelector('.admin--menu')



itemsMenu.forEach((element) =>
{
    element.addEventListener("click",()=>
    {
        console.log(element.dataset.link)

        document.querySelector('.admin--menu nav ul li a.active').classList.remove('active')
        element.classList.add('active')
        let oldItem = document.querySelector('.section--doc .block--doc .item--doc.active')
        if(oldItem != null){oldItem.classList.remove('active')}
        let newElement = document.querySelector(element.dataset.link)
        console.log(newElement)
        newElement.classList.add('active')
    })
})

window.addEventListener('scroll',(element)=>
{
    let body = document.body,
        html = document.documentElement;
    let height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
    if(((height - window.scrollY))-400 < (window.innerHeight - 52) )
    {
        asideMenu.classList.add('fixe')
    }
    else
    {
        asideMenu.classList.remove('fixe')
    }
})