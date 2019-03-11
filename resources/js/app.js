import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import CKEditor from '@ckeditor/ckeditor5-vue';

import CategoryIndex from './components/categories/CategoryIndex'
import CategoryCreate from './components/categories/CategoryCreate'
import CategoryEdit from './components/categories/CategoryEdit'

import PostIndex from './components/posts/PostIndex'
import PostCreate from './components/posts/PostCreate'
import PostEdit from './components/posts/PostEdit'
import Draft from './components/posts/Draft'

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(CKEditor);

const router = new VueRouter({
    base: '/admin',
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
        {
            path: '/posts/draft',
            name: 'posts.draft',
            component: Draft
        },

    ],
});

const app = new Vue({
    el: '.wrapper',
    router,
});
