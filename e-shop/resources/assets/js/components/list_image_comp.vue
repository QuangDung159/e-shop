<template>
    <table class="table table-striped table-bordered table-hover"
           id="dataTables-example">
        <thead>
        <tr align="center">
            <th>Image ID</th>
            <th>Image Preview</th>
            <th>Add to list</th>
        </tr>
        </thead>
        <tbody>
        <tr class="even gradeC" v-for="item in list_image_data">
            <td>{{item.id}}</td>
            <td>
                <img width="150px" :src="image_path + '/' + item.path"/>
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i>
                <a>Add</a>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "list_image_comp",
        data() {
            return {
                list_image_data: this.list_image,
            }
        },
        props:
            [
                "list_image",
                "image_path"
            ]
    }
</script>

<style scoped>

</style>