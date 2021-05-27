import $ from 'jquery';
window.$ = window.jQuery = $;
require('./bootstrap');

import 'bootstrap/js/dist/tooltip';

window.alertify = require('alertifyjs');
alertify.set('notifier','position', 'top-bottom');

require('./js');

