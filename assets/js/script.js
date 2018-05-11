import $ from 'jquery';
import skrollr from 'skrollr';

import './plugins/carousel';
import './plugins/menu';
// import './plugins/tabs';
import './plugins/tiles';

$('#carousel').Carousel();
$('#header').Menu();
// $('#tabs').Tabs();
$('#tiles').Tiles();

skrollr.init();
