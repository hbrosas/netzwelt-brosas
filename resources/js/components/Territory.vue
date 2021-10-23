<template>
    <div>
        <div class="accordion">
            <div class="accordion-item" v-for="children in territory.children" :key="children.id">
                <h2 class="accordion-header" v-if="hasProperty(children, 'children')">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#territory-'+children.id">
                        {{ children.name }}
                    </button>
                </h2>
                <h2 class="accordion-header" v-else>
                    <button class="accordion-no-body">
                        {{ children.name }}
                    </button>
                </h2>
                <div :id="'territory-'+children.id" class="accordion-collapse collapse" v-if="hasProperty(children, 'children')">
                    <div class="accordion-body">
                        <territory :territory="children"></territory>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default 
{
    props: [ 'territory' ],
    name: 'territory',
    mounted: function() {
        //
    },
    methods: {
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
