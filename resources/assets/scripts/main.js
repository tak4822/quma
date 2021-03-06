import 'jquery';

import firstTransition from './transitions/firstTransition';
firstTransition();

import common from './common';
// Load Events
jQuery(document).ready(() => {
  common();
});

// import local dependencies
import barbaInit from './transitions/barbaInit';
import frontpage from './routes/frontpage';
import contact from './routes/contact';
import events from './routes/events';
import singles from './routes/singles';
import others from './routes/others';

const routes = [frontpage, contact, events, singles, others];


// 最初のページローディングのスピードはこっちで調節
// ページ間でのトランジションはBarba.jsで調節
$(window).on('load', function () {
  barbaInit(routes);
});
