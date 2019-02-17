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
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Full Name</th>
                            <th>Role ID</th>
                            <th>Phone Number</th>
                            <th>D.O.B</th>
                            <th>Point</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="user in list_user">
                            <td>{{user.id}}</td>
                            <td>{{user.username}}</td>
                            <td>{{user.email}}</td>
                            <td>{{user.full_name}}</td>
                            <td>{{user.role_id}}</td>
                            <td>{{user.phone}}</td>
                            <td>{{user.dob}}</td>
                            <td>{{user.point}}</td>
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
    import User from "../user_model";
    import notification_comp from "./notification_comp";
    import alert_comp from "./alert_comp";
    import user_create_comp from "./user_create_comp";

    export default {
        name: "user_list_comp",
        data() {
            return {
                user: new User(),
                list_user: [],
                is_delete_trigger: false,
                list_error: [],
                is_show_notif: false,
                is_show_create: false,
                is_success: false
            }
        },

        props: [
            "create_button",
            "submit_button",
            "cancel_button"
        ],

        created() {
            this.getUserList();
        },

        methods: {
            getUserList() {
                window.axios.get("api/user/list/")
                    .then(response => {
                            this.list_user = response.data.list_user;
                        }
                    )
                    .catch(error => {
                            console.log(error)
                        }
                    );
            },

            getDeleteUser(user_id) {
                window.axios.get("api/user/delete/" + user_id)
                    .then(response => {
                            console.log(response);
                            this.is_delete_trigger = true;
                            this.is_show_notif = true;
                        }
                    )
                    .catch(error => {
                            console.log(error);
                            this.is_show_notif = false;
                            this.list_error = error.response.data;
                        }
                    );
            },

            navToUserDetail(user_id) {
                window.location.replace("admin/user/detail/" + user_id);
            },

            showCreate() {
                this.is_show_create = true;
            },

            catch_is_show_create(is_show_create) {
                this.is_show_create = is_show_create;
            },

            catch_user_created(user_created, is_success) {
                this.list_user.push(user_created);
                this.is_success = is_success

            }
        },

        watch: {
            is_delete_trigger() {
                this.getUserList();
            },
        },

        components: {
            notification_comp,
            alert_comp,
            user_create_comp
        }
    }
</script>

<style scoped>

</style>