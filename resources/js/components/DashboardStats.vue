import Vue from 'vue';
import DashboardStats from './components/DashboardStats.vue';

Vue.component('dashboard-stats', DashboardStats);

const app = new Vue({
el: '#app',
});
