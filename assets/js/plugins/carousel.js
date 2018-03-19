import $ from 'jquery';
import 'slick-carousel';
import plugin from './plugin';

class Carousel {
  constructor(element) {
    const $element = $(element);

    console.log($element);
    console.log('carousel');

    $element.slick({
      infinite: false,
    });
  }
}

Carousel.DEFAULTS = {};

plugin('Carousel', Carousel);
