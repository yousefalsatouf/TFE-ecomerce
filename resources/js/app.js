import './bootstrap'
import './rgpd'
import './main'
import 'jquery'
import Vue from 'vue'
import "leaflet/dist/leaflet.css"

Vue.use(require('vue-resource'));
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('leaflet-map', require('./components/MapComponent').default);
Vue.component('Shop', require('./components/ShopComponent').default);
Vue.component('Paypal', require('./components/PaypalComponent').default);
Vue.component('Reviews', require('./components/ReviewsComponent').default);


new Vue({
    el: "#app",
});