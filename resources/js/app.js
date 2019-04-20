import Vue from 'vue';
import VueRouter from 'vue-router'
import routes from './routes'

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter)

let app = new Vue({
    el: '#app',

    router: new VueRouter(routes)
});
