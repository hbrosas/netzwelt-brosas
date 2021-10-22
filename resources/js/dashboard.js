import Dashboard from './components/Dashboard.vue';

require('./bootstrap');
window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    components: {
    	'dashboard': Dashboard
    }
});