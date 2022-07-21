/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import VueSocialauth from 'vue-social-auth'
// import nuxt from 'vue-social-auth/nuxt'
import { routes } from './routes.js';
// import store from './store';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueSocialauth, {
    providers: {
        google: {
            clientId: '88e0a0f459045ac0a371',
            client_secret: '3f6b423489259d17c104585e700ab62d6629cf33',
            redirectUri: 'https://localhost:8000/auth/callback/google'
        },
        github: {
            clientId: '88e0a0f459045ac0a371',
            client_secret: '3f6b423489259d17c104585e700ab62d6629cf33',
            redirectUri: 'https://localhost:8000/auth/callback/github'
        },
        facebook: {
            clientId: '',
            redirectUri: 'https://localhost:8000/auth/callback/github'
        }
    }
});

// import App from './App.vue'
const App = () => import('./App.vue')

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    // stote: store,
    render: (h) => h(App),
});

export default app;