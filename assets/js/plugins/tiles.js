import $ from 'jquery';
import plugin from './plugin';

class Tiles {
  constructor(element) {
    this.$element = $(element);
    this.$tile = this.$element.find('.tiles__wrapper');

    console.log(this.$tile);

    this.events();
  }

  onmouseover(evt) {
    const $ele = $(evt.currentTarget);
    console.log(this.$tile);
    this.$tile.each((idx, ele) => {
      $(ele).addClass('not-hover');
    });
    $ele.removeClass('not-hover');
  }

  onmouseout() {
    this.$tiles.removeClass('not-hover');
  }

  events() {
    this.$tile.hover(this.onmouseover, this.onmouseout);

    // this.$tile.mouseover((evt) => {
    //   $(evt.target).siblings().addClass('not-hovered');
    // }).mouseleave(() => {
    //   this.$tile.removeClass('not-hovered');
    // });
  }
}

Tiles.DEFAULTS = {};

plugin('Tiles', Tiles);
