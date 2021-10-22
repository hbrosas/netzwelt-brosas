<template>
    <div class="row cont">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <form @submit="submit()">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="johndoe">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="*****">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Log In</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted: function() {
        console.log("Component mounted.");
    },
    methods: {
        submit() {
            var vm = this;
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
</style>
