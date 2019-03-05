
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// あとで
// import VueRouter from 'vue-router'

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css'
import locale from 'element-ui/lib/locale/lang/ja';

// Vue.use(VueRouter);
Vue.use(ElementUI, { locale })

// vue-routerのインスタンス化、オプションroutesでアクセスされるパスとその時に表示するComponentを指定
// const router = new VueRouter({
//     mode: 'history', // TODO ?
//     routes: [ { path: '/', component: require('./components/AllTermsComponent.vue') }, ]
//    });

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('exam-component', require('./components/ExamComponent.vue').default);
Vue.component('addition-term-component', require('./components/AdditionTermComponent.vue').default);
Vue.component('all-terms-component', require('./components/AllTermsComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
