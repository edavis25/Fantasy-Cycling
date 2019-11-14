
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// This file bootstraps various libraries (jquery, axios, etc...)
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('alert', require('./components/Alert.vue'));
Vue.component('modal', require('./components/Modal.vue'));
Vue.component('delete-confirm', require('./components/DeleteConfirm.vue'));
Vue.component('stages-card', require('./components/StagesCardCrud.vue'));
Vue.component('race-team-card', require('./components/RaceTeamCard.vue'));

const app = new window.Vue({
    'el': "#app",
});
