require('./bootstrap');
require('jquery');
require('./main');
require('./rgpd');
window.Vue = require('vue');
Vue.component('Map', require('./components/MapComponent.vue'));


new Vue({
    el: '#app',
});
