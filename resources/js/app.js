import './bootstrap'
import './rgpd'
import './main'
import 'jquery'
import Vue from 'vue'
import "leaflet/dist/leaflet.css";


Vue.component('leaflet-map', require('./components/MapComponent').default);
Vue.component('ex', require('./components/ExampleComponent').default);
new Vue({
    el: '#app',
});
