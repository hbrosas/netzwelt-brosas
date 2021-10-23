<template>
    <div class="row cont">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <h3 class="card-title">Territories</h3>
                        <span>Here are the list of territories:</span>
                    </div>

                    <div class="territories-container">
                        <div class="accordion">
                            <div class="accordion-item" v-for="territory in nestedTerritories" :key="territory.id">
                                <h2 class="accordion-header" v-if="hasProperty(territory, 'children')">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#territory-'+territory.id">
                                        {{ territory.name }}
                                    </button>
                                </h2>
                                <h2 class="accordion-header" v-else>
                                    <button class="accordion-no-body">
                                        {{ territory.name }}
                                    </button>
                                </h2>
                                <div :id="'territory-'+territory.id" class="accordion-collapse collapse" v-if="hasProperty(territory, 'children')">
                                    <div class="accordion-body">
                                        <territory :territory="territory"></territory>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary mt-3 logout-btn">Log Out</button>
        </div>
    </div>
</template>

<script>
import Territory from './Territory.vue';

export default 
{
    components: {
        'territory': Territory
    },
    data() {
        return {
            base_url: '/get/territories',
            territories: [],
            nestedTerritories: []
        }
    },
    mounted: function() {
        var __this = this;
        __this.fetchData();
    },
    methods: {
        async fetchData() {
            var __this = this;
            axios.get(__this.base_url)
            .then(res => {
                __this.territories = res.data.data;
            })
            .finally(() => {
                __this.nestedTerritories = __this.populateTerritories(__this.territories, null);
            });
        },

        populateTerritories(arr, parent) {
            var __this = this;
            var out = []

            for(var i in arr) {
                if(arr[i].parent == parent) {
                    var children = __this.populateTerritories(arr, arr[i].id)

                    if(children.length) {
                        arr[i].children = children;
                    }

                    out.push(arr[i])
                }
            }
            return out;
        },

        hasProperty(obj, property) {
            if(obj.hasOwnProperty(property)) return true;
            else return false;
        }
    }
};
</script>

<style scoped>
    .cont {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-content: center;
    }

    .logout-btn {
        float: right;
    }

    .territories-container {
        max-height: 60vh;
        overflow: scroll;
    }

    .accordion-no-body {
        font-size: 1rem;
        padding: 1rem 1.25rem;
        background-color: white;
        color: black;
        width: 100%;
        text-align: left;
        border: none;
    }
</style>
