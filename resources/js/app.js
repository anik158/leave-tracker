import './bootstrap';

import Alpine from 'alpinejs';



window.Alpine = Alpine;

Alpine.start();

import LeaveRequest from './components/LeaveRequest.vue';
import Vue from 'vue/dist/vue.esm.js';


Vue.component('leave-request', LeaveRequest);

const leave_request = new Vue({
    el: '#leave_request',
});

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

