import './bootstrap'
import './rgpd'
import './main'
import 'jquery'
import Vue from 'vue'
import "leaflet/dist/leaflet.css"


Vue.use(require('vue-resource'));
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('leaflet-map', require('./components/MapComponent').default);
Vue.component('shop', require('./components/ShopComponent').default);

new Vue({
    el: "#app",
});

