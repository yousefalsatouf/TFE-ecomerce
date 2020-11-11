import './bootstrap'
import './rgpd'
import './main'
import 'jquery'

window.Vue = require('vue');
Vue.component('street-map', require('./components/MapComponent').default);

const app = new Vue({
    el: '#app',
});
