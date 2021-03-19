<template>
    <div>
        <v-header/>
        <div class="jumbotron jumbotron-fluid mb-5">
            <div class="container">
                <h1>Hicaliber Test</h1>
                <p class="lead">
                    This is a modified jumbotron that occupies the entire horizontal space of its parent.
                </p>
                <div>
                    <v-search-form/>
                </div>
            </div>
        </div>
        <section>
            <v-search-card-list v-if="!loading"/>
            <v-loader v-if="loading"/>
        </section>

<!--        <v-footer/>-->
    </div>
</template>

<script>

import BaseHeader from './Base/Header.vue';
import BaseFooter from './Base/Footer.vue';
import BaseLoader from './Base/Loader.vue';
import SearchForm from './Search/Form.vue';
import SearchCardList from './Search/CardList.vue';
import store from "../store";

export default {
    name: "BaseComponent",
    components: {
        'v-header': BaseHeader,
        'v-footer': BaseFooter,
        'v-loader': BaseLoader,
        'v-search-form': SearchForm,
        'v-search-card-list': SearchCardList,
    },
    data() {
        return {};
    },
    methods: {},
    created() {
    },
    mounted() {
    },
    computed: {
        loading() {
            return store.getters["search/pending"];
        }
    }
};
</script>
<style lang="scss"></style>
