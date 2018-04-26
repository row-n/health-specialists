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

    $element.on('show', (event, tab) => {
      console.log(event, tab);
    });
  }
}

Tabs.DEFAULTS = {
  active: 1,
  animation: false,
  autoRotate: true,
  delay: 5000,
  mouseEvent: 'click',
};

plugin('Tabs', Tabs);
