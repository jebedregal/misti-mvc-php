import Swiper from 'swiper';
import { Navigation, Scrollbar } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/scrollbar';
import 'swiper/css/navigation';

document.addEventListener('DOMContentLoaded', function() {
    if(document.querySelector('.slider')) {

       const opciones = {
            slidesPerView: 1,
            spaceBetween: 40,
            centeredSlides: true,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            scrollbar: {
                el: ".swiper-scrollbar",
                hide: true,
              },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                },
            }
       }

       Swiper.use([ Navigation ], [ Scrollbar ])
        new Swiper('.slider', opciones)
    }
});