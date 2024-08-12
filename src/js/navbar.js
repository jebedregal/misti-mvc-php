
const hamMenu = document.querySelector(".ham_menu");
const offScreenMenu = document.querySelector(".off_screen_menu");
const overlay = document.querySelector(".overlay");

hamMenu.addEventListener("click", () => {
hamMenu.classList.toggle("active");
offScreenMenu.classList.toggle("active");
overlay.classList.toggle("active");
});

const back_menu = document.querySelector(".overlay");

back_menu.addEventListener("click", () => {
    back_menu.classList.remove("active");
})



document.addEventListener('click', e => {
    if(!offScreenMenu.contains(e.target) && !hamMenu.contains(e.target)) {
        hamMenu.classList.remove("active");
        offScreenMenu.classList.remove("active");
    }
})