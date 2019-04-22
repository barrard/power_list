import Vue from 'vue';
import VueRouter from 'vue-router'

import routes from './routes'

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter)

Vue.use(require('vue-moment'));


let app = new Vue({
    el: '#app',

    router: new VueRouter(routes),
});
