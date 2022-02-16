window.Vue = require('vue');

/* SETUP VUE-Router */
// Step 0 installa vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
// step 1 define route pages components
const Search = Vue.component('Search', require('./pages/Search.vue').default);

// Step 2 define vue router routes
const routes = [
    {
        path: '/searchadv',
        name: 'Search',
        component: Search,
    },
]

// Step 3 Create vue router instance
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('App', require('./App.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    el: '#app',
});