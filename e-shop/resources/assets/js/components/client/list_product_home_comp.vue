<template>
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="product_grid">
                        <!-- Product -->

                        <list_hot_product_comp
                                :directory_client_asset="this.directory_client_asset"></list_hot_product_comp>

                        <!-- Product -->

                        <list_product_new_comp
                                :directory_client_asset="this.directory_client_asset"></list_product_new_comp>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import list_hot_product_comp from "./list_hot_product_comp";
    import list_product_new_comp from "./list_product_new_comp";

    export default {
        name: "list_product_home_comp",

        props: [
            "directory_client_asset"
        ],

        components: {
            list_hot_product_comp,
            list_product_new_comp
        }
    }
</script>

<style scoped>

</style>