require('./bootstrap');
import $ from 'jquery';
window.$ = window.jQuery = $;

// datepicker from jquery ui
import 'jquery-ui/ui/widgets/datepicker.js';

$('.datepicker').datepicker();

