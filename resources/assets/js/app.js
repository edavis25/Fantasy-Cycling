
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// This file bootstraps various libraries (jquery, axios, etc...)
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('alert', require('./components/Alert.vue'));
Vue.component('deleteConfirm', require('./components/DeleteConfirm.vue'));

/*
const app = new Vue({
    el: '#app'
});
*/
