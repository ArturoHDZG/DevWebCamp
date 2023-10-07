import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';

document.addEventListener('DOMContentLoaded', function () {

  if (document.querySelector('.slider')) {
    const options = {
      freeMode: true,
      slidesPerView: 1,
      spaceBetween: 15,
      modules: [ Navigation ],
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      breakpoints: {
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
        1280: { slidesPerView: 4 }
      }
    }

    new Swiper('.slider', options);
    Swiper.use([ Navigation ]);
  }
});
