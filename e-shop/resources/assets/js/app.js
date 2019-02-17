/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

Vue.component("user-detail-comp", require("./components/user_detail_comp"));

Vue.component("user-list-comp", require("./components/user_list_comp"));

import moment from "moment";

Vue.filter("format_DDMMYYYY", function (datetime) {
    if (datetime) {
        return moment(String(datetime)).format("DD - MM - YYYY");
    }
});

const app = new Vue({
    el: '#app'
});
