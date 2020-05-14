require('./bootstrap');
require('jquery');
require('./main');

import Vue from 'vue'
import GMap from './components/MapComponent'
import * as VueGoogleMap from 'vue2-google-maps'


Vue.use(VueGoogleMap, {
    load: {
        key: "AIzaSyA_xlrERGGQXWyNBuIDDWhy2xfP5LC_Dl8",
        libraries: "places" // necessary for places input
    }
});

new Vue({
    el: '#gMap',
    template: '<GMap/>',
    components: { GMap }
});
