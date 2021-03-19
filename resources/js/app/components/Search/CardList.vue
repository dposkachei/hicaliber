<template>
    <div>
        <div class="container">
            <div class="row" v-if="results.length !== 0">
                <div class="col-3" v-for="result in results">
                    <v-card :item="result"/>
                </div>
            </div>
            <div class="row" v-if="results.length === 0">
                <div class="col-12">
                    <p class="text-center">
                        Empty results
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Card from "./../Base/Card";
import store from "./../../store";

export default {
    name: "CardList",
    components: {
        'v-card': Card,
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
        results() {
            return store.getters["search/results"];
        },
        loading() {
            return store.getters["search/pending"];
        }
    }
};
</script>
<style lang="scss"></style>
