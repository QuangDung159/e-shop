<template>
    <div class="user-detail-comp">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
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
                                        <label>User ID :</label>
                                        <input type="text" class="form-control" :disabled="!is_edit_clicked">
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <label>Username :</label>
                                        <input type="text" class="form-control" :disabled="!is_edit_clicked">
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <label>User Role :</label>
                                        <input type="text" class="form-control" :disabled="!is_edit_clicked">
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <label>Phone Number :</label>
                                        <input type="text" class="form-control" :disabled="!is_edit_clicked">
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <label>D.O.B :</label>
                                        <input type="text" class="form-control" :disabled="!is_edit_clicked">
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" :disabled="!is_edit_clicked">
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                                        <label>User Point :</label>
                                        <input type="text" class="form-control" :disabled="!is_edit_clicked">
                                    </div>
                                </div>

                                <hr>
                                <div v-if="!is_edit_clicked">
                                    <button type="button" class="btn btn-info"
                                            style="float: right;" v-on:click="changeEditClicked()">{{edit_button}}
                                    </button>
                                </div>
                                <div style="float: right;" v-else>
                                    <button type="submit" class="btn btn-success"
                                            style="margin-right: 1vh;">{{submit_button}}
                                    </button>
                                    <button type="button" class="btn btn-warning" v-on:click="changeEditClicked()">
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
    export default {
        name: "user_detail_comp",
        data() {
            return {
                "is_edit_clicked": false
            }
        },

        props: [
            "submit_button",
            "cancel_button",
            "edit_button"
        ],
        methods: {
            changeEditClicked() {
                this.is_edit_clicked = !this.is_edit_clicked;
            }
        }
    }
</script>

<style scoped>

</style>