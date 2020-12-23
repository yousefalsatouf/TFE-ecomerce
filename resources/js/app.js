import './bootstrap'
import './rgpd'
import './main'
import 'jquery'
import Vue from 'vue'
import "leaflet/dist/leaflet.css"
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueMaterial)
Vue.use(require('vue-resource'));
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('leaflet-map', require('./components/MapComponent').default);
Vue.component('Shop', require('./components/ShopComponent').default);
Vue.component('Paypal', require('./components/PaypalComponent').default);
Vue.component('Reviews', require('./components/ReviewsComponent').default);
Vue.component('Cart', require('./components/CartComponent').default);


new Vue({
    el: "#app",
});