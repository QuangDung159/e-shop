<template>
    <div class="list-hot-product-comp">
        <div class="product">
            <div class="product_image"><img v-bind:src="this.directory_client_asset + 'images/product_1.jpg'"
                                            alt=""></div>
            <div class="product_extra product_hot"><a href="categories.html">New</a></div>
            <div class="product_content">
                <div class="product_title"><a href="product.html">Smart Phone</a></div>
                <div class="product_price">$670</div>
            </div>
        </div>

        <!-- Product -->
        <div class="product">
            <div class="product_image"><img v-bind:src="this.directory_client_asset + 'images/product_1.jpg'"
                                            alt=""></div>
            <div class="product_extra product_hot"><a href="categories.html">New</a></div>
            <div class="product_content">
                <div class="product_title"><a href="product.html">Smart Phone</a></div>
                <div class="product_price">$670</div>
            </div>
        </div>

        <!-- Product -->
        <div class="product">
            <div class="product_image"><img v-bind:src="this.directory_client_asset + 'images/product_1.jpg'"
                                            alt=""></div>
            <div class="product_extra product_hot"><a href="categories.html">New</a></div>
            <div class="product_content">
                <div class="product_title"><a href="product.html">Smart Phone</a></div>
                <div class="product_price">$670</div>
            </div>
        </div>

        <!-- Product -->
        <div class="product">
            <div class="product_image"><img v-bind:src="this.directory_client_asset + 'images/product_1.jpg'"
                                            alt=""></div>
            <div class="product_extra product_hot"><a href="categories.html">New</a></div>
            <div class="product_content">
                <div class="product_title"><a href="product.html">Smart Phone</a></div>
                <div class="product_price">$670</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "list_hot_product_comp",

        props: [
            "directory_client_asset"
        ]

    }
</script>

<style scoped>

</style>