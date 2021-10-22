import Login from './components/Login.vue';

require('./bootstrap');
window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    components: {
    	'login': Login
    }
});