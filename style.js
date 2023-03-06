const hamburger = document.querySelector('.hamburger');
const navlinks = document.querySelector('.nav-links');
const links = document.querySelectorAll('.nav-links li');

hamburger.addEventListener("click", () => {
    navlinks.classList.toggle("open");
    links.forEach(link => {
        links.classList.toggle("fade");
    });
});

document.getElementById('login').addEventListener('click',
function()
{
   document.querySelector('.bg-modal').style.display ='flex';
});

document.querySelector('.close').addEventListener('click',
function(){
    document.querySelector('.bg-modal').style.display = 'none';
});