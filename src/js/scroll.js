document.addEventListener('DOMContentLoaded', function() {


    ScrollReveal();
    ScrollNav();
}) ;

var lastScrollTop = 0;
navbar = document.getElementById("navHead");
window.addEventListener("scroll", function(){
    var scrollTop = window.pageYOffset || document
        .documentElement.scrollTop;
        if(scrollTop > lastScrollTop) {
            navHead.style.top="-100px";
        } else {
            navHead.style.top="0px";
        }
        lastScrollTop = scrollTop;
})



function ScrollNav() {
    const navLinks = document.querySelectorAll(".mst-btn-cookies-separation-block, .mst-btn-privacidade-separation-block, .mst-btn-termos-de-uso-separation-block, .mst-btn-troca-de-produto-separation-block");

    navLinks.forEach( link => {
        link.addEventListener('click', e => {
            e.preventDefault()
            const sectionScroll = e.target.getAttribute('href');
            const section = document.querySelector(sectionScroll);


            section.scrollIntoView({behavior: 'smooth'})
            // console.log(section);
            // console.log(e.target.getAttribute('href'));
        })
    })
}


window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle("abajo", window.scrollY>0);
})



ScrollReveal({
    reset: true,
    distance: '60px',
    duration: 600,
    delay: 400
});

ScrollReveal().reveal('.texto-header', { delay: 100, origin: 'top'});

ScrollReveal().reveal('.main-tittle', { delay: 100, origin: 'top'});

ScrollReveal().reveal('.imagen-contacto', { delay: 100, origin: 'left'});
// ScrollReveal().reveal('.imagen-contacto-02', { delay: 100, origin: 'left'});
// ScrollReveal().reveal('.texto-contacto', { delay: 100, origin: 'left'});

