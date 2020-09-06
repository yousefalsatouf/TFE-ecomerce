require('./bootstrap');
require('jquery');
require('./main');

import Vue from 'vue'
import * as VueGoogleMap from 'vue2-google-maps'


Vue.use(VueGoogleMap, {
    load: {
        key: 'AIzaSyAp_1_HEiNQYPi15ZvsKWmN9WIDmg0ICwo',
    }
});

new Vue({
    el: '#gmap',
});


/*
* php artisan config:clear
php artisan cache:clear
php artisan config:cache
*
* */
