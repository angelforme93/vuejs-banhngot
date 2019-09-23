
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

import Vue from 'vue';

import VueRouter from 'vue-router';

import { routes } from './router.js';
import { store } from './store/store.js';
import axios from 'axios'
import VueAxios from 'vue-axios'

import Vue2Filters from 'vue2-filters'
 
Vue.use(Vue2Filters)
 
Vue.use(VueAxios, axios);
import Vuex from 'vuex';

import Paginate from 'vuejs-paginate';
Vue.component('paginate', Paginate)


import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);


Vue.use(Vuex)

Vue.use(VueRouter);

const router =new VueRouter({
    routes
})

const app = new Vue({
    el: '#app',
    router,
    store,
   
});
