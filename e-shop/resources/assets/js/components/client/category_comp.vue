<template>
    <li class="hassubs">
        <a href="categories.html">Categories</a>
        <ul>
            <li class="li-width" v-for="category in list_category">
                <a href="categories.html">{{category.name}}</a>
                <hr>
            </li>
        </ul>
    </li>
</template>

<script>
    export default {
        name: "category_comp",

        data() {
            return {
                list_category: []
            }
        },

        created() {
            this.getListCategory();
        },

        methods: {
            getListCategory() {
                window.axios.get("api/category/list")
                    .then(response => {
                            this.list_category = response.data.list_category;
                            console.log(response.data);
                        }
                    )
                    .catch(error => {
                            console.log(error.data.response);
                        }
                    )
            }
        }
    }
</script>

<style scoped>

</style>