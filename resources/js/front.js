window.Vue = require('vue');

import Vue from 'vue';
import App from './views/App.vue';

const App = new Vue({
    el: '#root',
    render: h => h(App)
})