<template>
    <div class="list-image-gallery-comp">
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
            <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                <div class="form-group">
                    <label>Product Name</label>
                    <select class="form-control" name="product_name"
                            v-model="product_id_data">
                        <option v-for="item in list_product_data"
                                :value="item.id">{{item.name}}
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
            <list_image_comp :list_image="list_image"
                             :image_path="image_path"
                             @imageToAdd="catch_imageToAdd(...arguments)"
                             :key="image_remove.id"></list_image_comp>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
            <list_image_product_comp :image_path="image_path"
                                     :list_image_to_add="list_image_to_add"
                                     :key="image.id"
                                     @image="catch_image(...arguments)"></list_image_product_comp>
        </div>
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
            <button type="button" class="btn btn-default"
                    v-on:click="postAddGallery()">
                {{submit_button}}
            </button>
            <button type="reset" class="btn btn-default">{{cancel_button}}</button>
        </div>
    </div>
</template>

<script>
    import list_image_comp from "./list_image_comp";
    import list_image_product_comp from "./list_image_product_comp";

    export default {
        name: "list_image_gallery_comp",

        data() {
            return {
                list_image_data: this.list_image,
                list_image_to_add: [],
                image: "",
                image_remove: "",
                product_id_data: "",
                list_product_data: this.list_product
            }
        },

        props: [
            "list_image",
            "image_path",
            "submit_button",
            "cancel_button",
            "list_product"
        ],

        components: {
            list_image_product_comp,
            list_image_comp
        },

        methods: {
            catch_imageToAdd(image) {
                this.image = image;
                let index = "";
                // find item id to delete
                this.list_image_data.forEach((item, key) => {
                        if (item.id == this.image.id) {
                            index = key;
                            return index;
                        }
                    }
                );

                // delete item
                // check count image
                if (this.list_image_to_add.length < 4) {
                    if (index >= 0) {
                    this.list_image_data.splice(index, 1);
                }
                    this.list_image_to_add.unshift(image);
                } else {
                    alert("Sorry! Too much");
                }
            },

            catch_image(image) {
                this.image_remove = image;
                let index = "";

                // find index of item
                this.list_image_to_add.forEach((item, key) => {
                        if (item.id == this.image.id) {
                            index = key;
                            return index;
                        }
                    }
                );

                // delete item
                if (index >= 0) {
                    this.list_image_to_add.splice(index, 1);
                }

                // add item to list
                this.list_image_data.unshift(image);
            },

            postAddGallery() {
                let list_image_to_add_json = JSON.stringify(this.list_image_to_add);
                console.log(list_image_to_add_json);
                window.axios.post("api/gallery/create",
                    {
                        product_id: this.product_id_data,
                        list_image_to_add: list_image_to_add_json
                    }
                ).then(response => {
                        console.log(response.data.result);
                    }
                ).catch(error => {
                        console.log(error.response.data);
                    }
                );
            },
        },

        watch: {}
    }
</script>

<style scoped>
</style>