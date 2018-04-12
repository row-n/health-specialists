import $ from 'jquery';
import skrollr from 'skrollr';

import './plugins/carousel';
import './plugins/menu';

$('#carousel').Carousel();
$('#header').Menu();

skrollr.init();
