<template>
    <div class="user-create-comp">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Alert -->
                        <alert_comp :list_error="list_error"
                                    v-if="!is_show_notif"></alert_comp>
                        <!-- End Alert -->

                        <!-- User Detail -->
                        <h1 class="page-header">User
                            <small>Create</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="row">
                        <div class="col-lg-7 col-sm-7 col-xs-7 col-md-7">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>Username :</label>
                                            <input type="text" class="form-control"
                                                   v-model="user.username">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>User Role :</label>
                                            <select class="form-control"
                                                    v-model="user.role_id">
                                                <option v-for="role in list_role"
                                                        v-bind:value="role.id"
                                                        v-bind:selected="role.id == '1'">{{role.name}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>Full Name :</label>
                                            <input type="text" class="form-control"
                                                   v-model="user.full_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number :</label>
                                            <input type="text" class="form-control"
                                                   v-model="user.phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>D.O.B :</label>
                                            <input type="date" class="form-control"
                                                   v-model="user.dob">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <input type="text" class="form-control"
                                                   v-model="user.email">
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div style="float: right;">
                                    <button type="button" class="btn btn-success"
                                            style="margin-right: 1vh;"
                                            v-on:click="postCreateUser()">{{submit_button}}
                                    </button>
                                    <button type="button" class="btn btn-warning" v-on:click="cancelCreateUser()">
                                        {{cancel_button}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
</template>

<script>
    import User from "../user_model";
    import Role from "../role_model";
    import notification_comp from "./notification_comp";
    import alert_comp from "./alert_comp";

    export default {
        name: "user_create_comp",
        data() {
            return {
                user: new User(),
                role: new Role(),
                list_role: [],
                is_show_notif: false,
                list_error: []
            }
        },

        created() {
            this.getListRole();
        },

        methods: {
            cancelCreateUser() {
                this.$emit("is_show_create", false);
            },

            postCreateUser() {
                const user = this.user;
                window.axios.post("api/user/create", {
                        username: user.username,
                        full_name: user.full_name,
                        role_id: user.role_id,
                        phone: user.phone,
                        dob: user.dob,
                        email: user.email
                    }
                ).then(response => {
                        console.log(response.data.user);
                        this.is_show_notif = true;
                        // is_success = true
                        this.$emit("user_created", response.data.user, true);
                        this.cancelCreateUser()
                    }
                ).catch(error => {
                        console.log(error.response.data);
                        this.list_error = error.response.data;
                    }
                );
            },

            getListRole() {
                window.axios.get("api/role/list")
                    .then(response => {
                            this.list_role = response.data.list_role;
                            console.log(this.list_role);
                        }
                    )
                    .catch(error => {
                            console.log(error.response.data);
                        }
                    );
            },
        },

        props: [
            "submit_button",
            "cancel_button"
        ],

        components: {
            notification_comp,
            alert_comp
        }
    }
</script>

<style scoped>

</style>