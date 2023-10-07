import Swiper from "swiper";
import { Navigation } from "swiper/modules";
import 'swiper/css';
import 'swiper/css/navigation';

document.addEventListener("DOMContentLoaded", function () {

  if (document.querySelector('.slider')) {
    const options = {
      slidesPerView: 1,
      spaceBetween: 15,
      modules: [Navigation],
      navigation: {
        nextEL: '.swiper-button-next',
        prevEL: '.swiper-button-prev'
      },
      breakpoints: {
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
        1280: { slidesPerView: 4 }
      }
    }

    Swiper.use([ Navigation ]);
    new Swiper('.slider', options);
  }
});
