/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(CKEditor);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

import CategoryIndex from './components/categories/CategoryIndex'
import CategoryCreate from './components/categories/CategoryCreate'
import CategoryEdit from './components/categories/CategoryEdit'

import PostIndex from './components/posts/PostIndex'
import PostCreate from './components/posts/PostCreate'
import PostEdit from './components/posts/PostEdit'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    base: '/admin#',
    mode: 'history',
    routes: [
        {
            path: '/categories',
            name: 'categories.list',
            component: CategoryIndex
        },
        {
            path: '/categories/create',
            name: 'categories.create',
            component: CategoryCreate
        },
        {
            path: '/categories/edit/:id',
            name: 'categories.edit',
            component: CategoryEdit
        },
        {
            path: '/posts',
            name: 'posts.list',
            component: PostIndex
        },
        {
            path: '/posts/create',
            name: 'posts.create',
            component: PostCreate
        },
        {
            path: '/posts/edit/:id',
            name: 'posts.edit',
            component: PostEdit
        },

    ],
});

const app = new Vue({
    el: '.wrapper',
    router,
});
