import $ from 'jquery';
import 'slick-carousel';
import plugin from './plugin';

class Carousel {
  constructor(element, options) {
    const $element = $(element);

    $element.slick({
      arrows: options.arrows,
      infinite: options.infinite,
      speed: options.speed,
    });
  }
}

Carousel.DEFAULTS = {
  arrows: true,
  infinite: true,
  speed: 300,
};

plugin('Carousel', Carousel);
