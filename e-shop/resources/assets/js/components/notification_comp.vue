<template>
    <div class="notification-comp">
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{action}} {{module}} successfully</strong>
        </div>
    </div>
</template>

<script>
    export default {
        name: "notification_comp",

        data() {
            return {}
        },

        props: [
            "action",
            "module"
        ]
    }
</script>

<style scoped>
    .notification-comp {
        margin-top: 1vh;
    }
</style>