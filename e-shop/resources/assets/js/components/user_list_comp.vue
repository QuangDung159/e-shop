<template>
    <div class="list-user-comp">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
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

    export default {
        name: "user_list_comp",
        data() {
            return {
                user: new User(),
                list_user: [],
                is_delete_trigger: false
            }
        },

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
                        }
                    )
                    .catch(error => {
                            console.log(error)
                        }
                    );
            },

            navToUserDetail(user_id) {
                window.location.replace("admin/user/detail/" + user_id);
            },
        },

        watch: {
            is_delete_trigger() {
                this.getUserList();
            }
        }
    }
</script>

<style scoped>

</style>