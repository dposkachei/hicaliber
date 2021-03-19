require('babel-polyfill');

import Vue from 'vue';
import Vuex from 'vuex';
import search from './modules/search';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        search,
    },
    state: {},
    getters: {
        loading: state => {
            return state.loading;
        },
    },
    mutations: {},
    actions: {}
});
