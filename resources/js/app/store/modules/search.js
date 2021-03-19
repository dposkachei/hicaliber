import axios from "axios";
import api from "./../../api/api";

// initial state
const state = () => ({
    pending: false,
    results: {},
})

// getters
const getters = {
    results(state) {
        return state.results;
    },
    pending(state) {
        return state.pending;
    },
}

// actions
const actions = {
    async fetchSearch({commit}, data) {
        commit('pending', true);
        const string = new URLSearchParams(data).toString();
        console.log(string);
        axios.get(api.search + '?' + string)
            .then(response => {
                const result = response.data;
                const results = result.data;
                commit('pending', false);
                commit('setResults', results);
            })
            .catch(error => {
                const data = error.response.data;
                commit('pending', false);
                console.log(data.message);
                window.notification.error(data.message);
            });
    },
};

// mutations
const mutations = {
    pending: (state, val) => {
        state.pending = val;
    },
    setResults(state, data) {
        state.results = data;
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
