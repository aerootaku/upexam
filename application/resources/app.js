import Vue from 'vue'
import axios from "./axios.js"
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);
import themeConfig from "./themeConfig";
Vue.prototype.$http = axios;
import 'material-icons/iconfont/material-icons.css';
import { ValidationProvider, extend } from 'vee-validate';
// Register it globally
Vue.component('ValidationProvider', ValidationProvider);
import * as rules from 'vee-validate/dist/rules';
import { messages } from 'vee-validate/dist/locale/en.json';

Object.keys(rules).forEach(rule => {
    extend(rule, {
        ...rules[rule], // copies rule configuration
        message: messages[rule] // assign message
    });
});

Vue.component('dashboard', require('./Components/Admin/dashboard').default);
Vue.component('manage-customers', require('./Components/Admin/manage-customers').default);

const app = new Vue({
    el: '#app',
    model: 'history'
});