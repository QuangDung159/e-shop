<template>
    <div class="gallery-list-comp">
        <div class="row">
            <div class="col-lg-12">

                <!-- Notification -->
                <notification_comp action="Create"
                                   module="gallery"
                                   v-if="is_success"></notification_comp>
                <!-- End Notification -->

                <!-- User Detail -->
                <h1 class="page-header">Gallery
                    <small>Create</small>
                    <small style="float: right">
                        <a role="button" href="admin/gallery/list">Back To List</a>
                    </small>
                </h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                    <list-image-gallery-comp :list_image="list_image"
                                             :list_product="list_product"
                                             :image_path="image_path"
                                             :submit_button="submit_button"
                                             :cancel_button="cancel_button"
                                             @is_success="catch_is_success(...arguments)"></list-image-gallery-comp>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import notification_comp from "./notification_comp";

    export default {
        name: "gallery_list_comp",
        components: {notification_comp},
        data() {
            return {
                is_success: false
            }
        },

        props: [
            "list_image",
            "image_path",
            "submit_button",
            "cancel_button",
            "list_product"
        ],

        methods: {
            catch_is_success(is_success) {
                this.is_success = is_success;
            }
        }
    }
</script>

<style scoped>

</style>