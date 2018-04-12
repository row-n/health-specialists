import $ from 'jquery';
import 'slick-carousel';
import plugin from './plugin';

class Carousel {
  constructor(element, options) {
    const $element = $(element);

    $element.slick({
      arrows: options.arrows,
      autoplay: options.autoplay,
      autoplaySpeed: options.autoplaySpeed,
      fade: options.fade,
      infinite: options.infinite,
      mobileFirst: options.mobileFirst,
      pauseOnFocus: options.pauseOnFocus,
      pauseOnHover: options.pauseOnHover,
      speed: options.speed,
    });
  }
}

Carousel.DEFAULTS = {
  arrows: true,
  autoplay: true,
  autoplaySpeed: 5000,
  fade: true,
  infinite: true,
  mobileFirst: true,
  pauseOnFocus: false,
  pauseOnHover: false,
  speed: 500,
};

plugin('Carousel', Carousel);
