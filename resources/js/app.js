import Vue from 'vue';
import VueRouter from 'vue-router'
import routes from './routes'
import FullCalendar from 'vue-full-calendar'

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter)
Vue.use(FullCalendar)

let app = new Vue({
    el: '#app',

    router: new VueRouter(routes)
});
