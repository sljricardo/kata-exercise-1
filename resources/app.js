import Vue from 'vue';
import axios from 'axios';
import App from './components/app.vue';

Vue.use({
    install (Vue) {
        Vue.prototype.$api = axios.create()
    }
})

new Vue({
    el: "#root",
    render: h => h(App)
})