import Vue from 'vue';
import axios from 'axios';
import App from './components/app.vue';

window.axios = axios;

new Vue({
    el: "#root",
    render: h => h(App)
})