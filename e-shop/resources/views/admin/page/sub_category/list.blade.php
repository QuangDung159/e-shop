@extends("admin.layout.main")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sub Category
                        <small>List - <a role="button">{{$CREATE_BUTTON}}</a></small>
                        </small>

                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>Sub Category ID</th>
                        <th>Sub Category Name</th>
                        <th>Category Name</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_sub_category as $sub_category)
                        <tr class="even gradeC">
                            <td>{{$sub_category->id}}</td>
                            <td>{{$sub_category->name}}</td>
                            <td>{{$sub_category->category->name}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#">{{$DELETE_BUTTON}}</a>
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">{{$EDIT_BUTTON}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection