<template>
    <div class="user-detail-comp">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Notification -->
                        <notification_comp action="Update"
                                           module="user"
                                           v-if="is_show_notif"></notification_comp>
                        <!-- End Notification -->

                        <!-- Alert -->
                        <alert_comp :list_error="list_error" v-else></alert_comp>
                        <!-- Edn Alert -->

                        <!-- User Detail -->
                        <h1 class="page-header">User
                            <small>Detail</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="row">
                        <div class="col-lg-7 col-sm-7 col-xs-7 col-md-7">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>User ID :</label>
                                            <input type="text" class="form-control" disabled
                                                   v-model="user.id">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>Username :</label>
                                            <input type="text" class="form-control" disabled
                                                   v-model="user.username">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>User Role :</label>
                                            <select class="form-control" :disabled="!is_edit_clicked"
                                                    v-model="user.role_id">
                                                <option v-for="role in list_role"
                                                        v-bind:value="role.id"
                                                        v-bind:selected="user.role_id == role.id">{{role.name}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>Full Name :</label>
                                            <input type="text" class="form-control" :disabled="!is_edit_clicked"
                                                   v-model="user.full_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number :</label>
                                            <input type="text" class="form-control" :disabled="!is_edit_clicked"
                                                   v-model="user.phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>D.O.B :</label>
                                            <input type="date" class="form-control" :disabled="!is_edit_clicked"
                                                   v-model="user.dob">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <input type="text" class="form-control" :disabled="!is_edit_clicked"
                                                   v-model="user.email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <div class="form-group">
                                            <label>User Point :</label>
                                            <input type="text" class="form-control" disabled
                                                   v-model="user.point">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div v-if="!is_edit_clicked">
                                    <button type="button" class="btn btn-info"
                                            style="float: right;" v-on:click="changeEditClicked()">{{edit_button}}
                                    </button>
                                </div>
                                <div style="float: right;" v-else>
                                    <button type="button" class="btn btn-success"
                                            style="margin-right: 1vh;"
                                            v-on:click="postUpdateUser()">{{submit_button}}
                                    </button>
                                    <button type="button" class="btn btn-warning" v-on:click="cancelUpdateUser()">
                                        {{cancel_button}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import User from "../user_model";
    import Role from "../role_model";
    import notification_comp from "./notification_comp";
    import alert_comp from "./alert_comp";
    import Helper from "../helper";

    export default {
        name: "user_detail_comp",
        data() {
            return {
                "is_edit_clicked": false,
                user: new User(),
                role: new Role(),
                list_role: [],
                is_show_notif: false,
                list_error: [],
                helper: new Helper()
            }
        },

        props: [
            "submit_button",
            "cancel_button",
            "edit_button",
            "user_id"
        ],

        created() {
            this.getUserDetail();
        },

        methods: {
            changeEditClicked() {
                this.is_edit_clicked = !this.is_edit_clicked;
            },

            cancelUpdateUser() {
                this.changeEditClicked();
                this.getUserDetail();
            },

            getUserDetail() {
                window.axios.get("api/user/detail/" + this.user_id)
                    .then(response => {
                            const user = response.data.user;
                            this.user.id = user.id;
                            this.user.email = user.email;
                            this.user.role_id = user.role_id;
                            this.user.username = user.username;
                            this.user.phone = user.phone;
                            this.user.point = user.point;
                            this.user.dob = this.helper.formatDate(user.dob);
                            this.user.full_name = user.full_name;
                            this.getListRole();
                        }
                    )
                    .catch(error => {
                            console.log(error.data);
                        }
                    )
            },

            getListRole() {
                window.axios.get("api/role/list")
                    .then(response => {
                            this.list_role = response.data.list_role;
                            console.log(this.list_role);
                        }
                    )
                    .catch(error => {
                            console.log(error.data)
                        }
                    );
            },

            postUpdateUser() {
                window.axios.post("api/user/detail/" + this.user_id,
                    {
                        role_id: this.user.role_id,
                        full_name: this.user.full_name,
                        phone: this.user.phone,
                        dob: this.user.dob,
                        email: this.user.email
                    }
                ).then(response => {
                        console.log(response.data.user);
                        this.is_edit_clicked = false;
                        this.is_show_notif = true;
                    }
                ).catch(error => {
                        console.log(error.response.data);
                        this.list_error = error.response.data;
                        this.is_show_notif = false;
                    }
                );
            },
        },

        components:
            {
                notification_comp,
                alert_comp
            }
    }
</script>

<style scoped>

</style>