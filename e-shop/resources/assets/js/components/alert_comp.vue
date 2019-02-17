<template>
    <div class="alert-comp">
        <div class="alert alert-danger alert-dismissible" v-for="error in list_error">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{error[0]}}</strong>
        </div>
    </div>
</template>

<script>
    export default {
        name: "alert_comp",

        data() {
            return {}
        },

        props: [
            "list_error"
        ]
    }
</script>

<style scoped>
    .alert-comp {
        margin-top: 1vh;
    }
</style>