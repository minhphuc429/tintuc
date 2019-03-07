/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');

// Vue.config.devtools = true;
// Vue.config.performance = true;

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

import App from './components/App'
import CategoryIndex from './components/categories/CategoryIndex'
import CategoryCreate from './components/categories/CategoryCreate'
import CategoryEdit from './components/categories/CategoryEdit'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    // mode: 'history',
    routes: [
        {
            path: '/',
            redirect: '/admin',
        },
        {
            path: '/categories',
            name: 'categories.list',
            component: CategoryIndex
        },
        {
            path: 'create',
            name: 'categories.create',
            component: CategoryCreate
        },
        {
            path: 'edit/:id',
            name: 'categories.edit',
            component: CategoryEdit
        }
    ],
});

const app = new Vue({
    el: '.wrapper',
    router,
});
