<template>
    <div>
        <form @submit="onSubmit">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="text-muted ml-2 mb-0 form-label">Title</label>
                        <input type="text" class="form-control" v-model="title" @keyup="onChange" placeholder="Title">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="text-muted ml-2 mb-0 form-label">Price</label>
                        <div class="input-group">
                            <input type="number" aria-label="First name" placeholder="From" class="form-control" v-model="price.from">
                            <input type="number" aria-label="Last name" placeholder="To" class="form-control" v-model="price.to">
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" :class="[
                        'btn btn-primary btn-block mt-4',
                        loading ? 'is-loading' : ''
                    ]">Search</button>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="text-muted ml-2 mb-0 form-label">Bedrooms</label>
                        <input type="number" class="form-control" placeholder="Bedrooms" v-model="bedrooms">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="text-muted ml-2 mb-0 form-label">Bathrooms</label>
                        <input type="number" class="form-control" placeholder="Bathrooms" v-model="bathrooms">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="text-muted ml-2 mb-0 form-label">Storeys</label>
                        <input type="number" class="form-control" placeholder="Storeys" v-model="storeys">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="text-muted ml-2 mb-0 form-label">Garages</label>
                        <input type="number" class="form-control" placeholder="Garages" v-model="garages">
                    </div>
                </div>

            </div>

<!--            <div class="input-group">-->
<!--                <div class="input-group-prepend">-->
<!--                    <span class="input-group-text" id="inputGroup-sizing-sm">Price</span>-->
<!--                </div>-->
<!--                <input type="text" aria-label="First name" placeholder="From" class="form-control">-->
<!--                <input type="text" aria-label="Last name" placeholder="To" class="form-control">-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <input type="number" class="form-control" placeholder="bathrooms">-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <input type="number" class="form-control" placeholder="storeys">-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <input type="number" class="form-control" placeholder="garages">-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <input type="number" class="form-control" placeholder="price">-->
<!--            </div>-->

        </form>
    </div>
</template>

<script>

import store from "./../../store";
import { mapActions } from "vuex";

export default {
    name: "Form",
    components: {},
    data() {
        return {
            timer: null,
            title: '',
            price: {
                from: null,
                to: null,
            },
            bedrooms: null,
            bathrooms: null,
            storeys: null,
            garages: null,
        };
    },
    methods: {
        ...mapActions("search", ["fetchSearch"]),

        /**
         *
         */
        onSubmit(e) {
            const self = this;
            e.preventDefault();
            self.fetch();
        },

        /**
         *
         */
        fetch() {
            const self = this;
            let data = {};
            data = window._.pickBy({
                title: self.title,
                price_from: self.price.from,
                price_to: self.price.to,
                bedrooms: self.bedrooms,
                bathrooms: self.bathrooms,
                storeys: self.storeys,
                garages: self.garages,
            }, window._.identity);
            self.fetchSearch(data);
        },

        /**
         *
         */
        searchTimeOut() {
            const self = this;
            if (self.timer !== null) {
                clearTimeout(self.timer);
                self.timer = null;
            }
            self.timer = setTimeout(() => {
                self.fetch();
            }, 500);
        },

        /**
         *
         * @param e
         * @returns {boolean}
         */
        onChange(e) {
            const self = this;
            let c = e.keyCode;
            if (c === 67) {
                return false;
            } else if (c === 86) {
                //return false
            } else if (c === 88) {
                return false;
            } else if (c === 17) {
                return false;
            }
            self.searchTimeOut();
        },
    },
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
