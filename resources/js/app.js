import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import VueMaterial from 'vue-material'
import './admin/main'
import "leaflet/dist/leaflet.css"
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'

// ........................
import './bootstrap'
import 'jquery'
import './rgpd'
import './main'
//..........................

// Global 

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueMaterial)
Vue.use(require('vue-resource'));

// Client side 
import Shop from './client/components/ShopComponent'
import Rating from './client/components/RatingComponent'
import Cart from './client/components/CartComponent'
import Paypal from './client/components/PaypalComponent'
import Leafletmap from './client/components/MapComponent'

new Vue({
  el: "#app",
  components: {
    Shop,
    Rating,
    Cart,
    Paypal,
    Leafletmap
  }
});