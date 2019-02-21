@extends("admin.layout.main")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="notification" style="margin-top: 1vh;">
                        @if(session("success"))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session("success")}}
                            </div>
                        @endif
                        @if(session("error"))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session("error")}}
                            </div>
                        @endif
                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                @foreach($errors->all() as $item)
                                    {{$item}}<br>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    
                    <h1 class="page-header">Sub Category
                        <small>List - <a role="button" href="admin/sub_category/create">{{$CREATE_BUTTON}}</a></small>
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
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                <a href="admin/sub_category/delete/{{$sub_category->id}}">{{$DELETE_BUTTON}}</a>
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i>
                                <a href="admin/sub_category/update/{{$sub_category->id}}">{{$EDIT_BUTTON}}</a>
                            </td>
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