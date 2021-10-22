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

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary mt-3 logout-btn">Log Out</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            base_url: 'https://netzwelt-devtest.azurewebsites.net/Territories/All',
            territories: []
        }
    },
    mounted: function() {
        var __this = this;
        __this.fetchData();
    },
    methods: {
        async fetchData() {
            var __this = this;
            axios.get(__this.base_url, {
                headers: {
                    'Access-Control-Allow-Origin': '*',
                    'Access-Control-Allow-Methods': 'POST, GET, OPTIONS, DELETE, PUT',
                    'Access-Control-Allow-Headers': 'append,delete,entries,foreach,get,has,keys,set,values,Authorization'
                }
            })
            .then(res => {
                console.log(res);
            });

            // try {
            //     const url = __this.base_url
            //     const response = await axios.get(url)
                
            //     const results = response.data.results

            //     console.log(results);

            //     } catch (err) {
            //         if (err.response) {
            //         // client received an error response (5xx, 4xx)
            //         console.log("Server Error:", err)
            //         } else if (err.request) {
            //         // client never received a response, or request never left
            //         console.log("Network Error:", err)
            //         } else {
            //         console.log("Client Error:", err)
            //         }
            //     }
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
</style>
