/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import 'material-design-icons-iconfont/dist/material-design-icons.css';

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/ja';

Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(ElementUI, { locale });

const router = new VueRouter({
  mode: 'history',
  routes: [
    { path: '/', name: 'menu', component: require('./components/MenuComponent.vue').default },
    {
      path: '/select',
      name: 'selectCategory',
      component: require('./components/SelectCategoryComponent.vue').default
    },
    { path: '/exam', name: 'exam', component: require('./components/ExamComponent.vue').default },
    { path: '/history', name: 'history', component: require('./components/QuestionHistoryComponent.vue').default },
    { path: '/list', name: 'list', component: require('./components/AllTermsComponent.vue').default },
    {
      path: '/addition_term',
      component: require('./components/AdditionTermComponent.vue').default,
      children: [
        {
          path: 'create',
          component: require('./components/addition_term/CreateComponent.vue').default
        },
        {
          path: 'list',
          component: require('./components/addition_term/ListComponent.vue').default
        }
      ]
    }
  ]
});

Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);

const app = new Vue({
  router,
  el: '#app'
});
