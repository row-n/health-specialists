import $ from 'jquery';
import 'tabslet';
import plugin from './plugin';

class Tabs {
  constructor(element, options) {
    const $element = $(element);

    $element.tabslet({
      active: options.active,
      animation: options.animation,
      autorotate: options.autoRotate,
      delay: options.delay,
      mouseevent: options.mouseEvent,
    });
  }
}

Tabs.DEFAULTS = {
  active: 1,
  animation: true,
  autoRotate: true,
  delay: 5000,
  mouseEvent: 'click',
};

plugin('Tabs', Tabs);
