
const menuBtn = document.querySelector('.menu-btn');
const sidebar = document.querySelector('.sidebar');
const closeBtn = document.querySelector('.close-btn');

menuBtn.addEventListener('click', menuBtnF);

function menuBtnF() {
    sidebar.classList.toggle('active');
    menuBtn.setAttribute("style","visibility: hidden;");
};

closeBtn.addEventListener('click', closeBtnF);
    
function closeBtnF() {
    sidebar.classList.remove('active');
    menuBtn.setAttribute("style","visibility: visible;");
}
