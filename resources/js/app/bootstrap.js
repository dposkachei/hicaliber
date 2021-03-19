window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Vue from 'vue';
import Vuex from 'vuex';
import store from './store';
import { BootstrapVue } from 'bootstrap-vue';

Vue.use(Vuex);
Vue.use(BootstrapVue);

window.axios = require('axios');

Vue.prototype.$http = window.axios;

import BaseComponent from './components/IndexComponent.vue';

new Vue({
    el: '#app',
    store,
    render: h => h(BaseComponent),
    data: {},
});
