<template>
    <div class="list-user-comp">

        <user_create_comp :submit_button="submit_button"
                          :cancel_button="cancel_button"
                          v-if="is_show_create"
                          @is_show_create="catch_is_show_create(...arguments)"
                          @user_created="catch_user_created(...arguments)"></user_create_comp>

        <div id="page-wrapper" v-else>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Notification -->
                        <notification_comp action="Create"
                                           module="user"
                                           v-if="is_success"></notification_comp>
                        <!-- End Notification -->

                        <!-- Notification -->
                        <notification_comp action="Delete"
                                           module="user"
                                           v-if="is_show_notif"></notification_comp>
                        <!-- End Notification -->

                        <!-- Alert -->
                        <alert_comp :list_error="list_error"
                                    v-else></alert_comp>
                        <!-- End Alert -->

                        <h1 class="page-header">User
                            <small>List - <a role="button"
                                             v-on:click="showCreate()">{{create_button}}</a></small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="category in list_category">
                            <td>{{category.id}}</td>
                            <td>{{category.name}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                <a role="button" v-on:click="getDeleteUser(user.id)">Delete</a>
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i>
                                <a role="button" v-on:click="navToUserDetail(user.id)">Edit</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</template>

<script>
    import Category from "../category_model.js";
    import alert_comp from "./alert_comp";
    import notification_comp from "./notification_comp";

    export default {
        name: "category_list_comp",

        data() {
            return {
                list_category: [],
                is_delete_trigger: false,
                list_error: [],
                is_show_notif: false,
                is_show_create: false,
                is_success: false
            }
        },

        props:
            [
                "create_button",
                "submit_button",
                "cancel_button"
            ],

        created() {
            this.getListCategory();
        },

        methods: {
            getListCategory() {
                window.axios.get("api/category/list")
                    .then(response => {
                            console.log(response.data.list_category);
                            this.list_category = response.data.list_category;
                        }
                    )
                    .catch(error => {
                            console.log(error.response.data);
                        }
                    );
            }
        },

        components: {
            notification_comp,
            alert_comp
        }
    }
</script>

<style scoped>

</style>