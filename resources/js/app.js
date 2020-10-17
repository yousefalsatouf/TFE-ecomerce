require('./bootstrap');
require('jquery');
require('./main');
require('./map');

import Vue from 'vue'
import * as VueGoogleMap from 'vue2-google-maps'

// holding vue for the moment, instead using javascript to ingrate the map
Vue.use(VueGoogleMap, {
    load: {
        key: 'AIzaSyAp_1_HEiNQYPi15ZvsKWmN9WIDmg0ICwo',
    }
});

new Vue({
    el: '#gmap',
});
