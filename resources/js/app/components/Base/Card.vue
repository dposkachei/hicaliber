<template>
    <div>
        <div class="card border-light mb-3">
            <div class="card-body" >
                <h5 class="card-title">{{ item.title }}</h5>
                <div class="card-parameters">
                    <div class="card-parameter">
                        <div>Bedrooms:</div>
                        <div><b>{{ item.bedrooms }}</b></div>
                    </div>
                    <div class="card-parameter">
                        <div>Bathrooms:</div>
                        <div><b>{{ item.bathrooms }}</b></div>
                    </div>
                    <div class="card-parameter">
                        <div>Storeys:</div>
                        <div><b>{{ item.storeys }}</b></div>
                    </div>
                    <div class="card-parameter">
                        <div>Garages:</div>
                        <div><b>{{ item.garages }}</b></div>
                    </div>
                    <div class="card-parameter __h4">
                        <div>Price:</div>
                        <div><b>{{ item.price }}</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "Card",
    components: {},
    props: {
        item: {
            type: Object,
            default: null
        },
    },
    data() {
        return {};
    },
    methods: {},
    created() {
    },
    mounted() {
    },
    computed: {}
};
</script>
<style lang="scss">
.card-parameters {
    line-height: 1.4;
    font-size: 14px;
    .card-parameter {
        display: flex;
        align-items: center;
        justify-content: space-between;
        &.__h4 {
            font-size: 18px;
        }
    }
}
</style>
