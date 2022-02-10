// window.Vue = require('vue');

import Vue from 'vue';
import App from './views/App.vue';
import router from './routes';

const app = new Vue({
    el: '#root',
    router,
    render: h => h(App)
})