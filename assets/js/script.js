import $ from 'jquery';
import skrollr from 'skrollr';

import './plugins/carousel';
import './plugins/menu';
import './plugins/tabs';

$('#carousel').Carousel();
$('#header').Menu();
$('#tabs').Tabs();

skrollr.init();
