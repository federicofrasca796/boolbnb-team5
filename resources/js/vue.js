window.Vue = require('vue');

//Vue router import
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//Define vue components
const advancedSearch = Vue.component('search', require('./pages/Search.vue').default);
const App = Vue.component('App', require('./App.vue').default);

//Define routes for components
const routes = [
    {
        path: '/search',
        name: 'search',
        component: advancedSearch
    }
]

//Initialize router
const router = new VueRouter({
    mode: 'history',
    routes,
});

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

// import search from './pages/Search.vue';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    routes,
    /* components:
    {
        search
    } */
});