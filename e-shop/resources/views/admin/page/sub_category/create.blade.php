@extends("admin.layout.main")
@section("content")
    <div class="user-detail-comp">
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

                        <!-- User Detail -->
                        <h1 class="page-header">Sub Category
                            <small>Create</small>
                            <small style="float: right">
                                <a role="button" href="admin/sub_category/list">Back To List</a>
                            </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                            <form action="admin/sub_category/create" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Sub Category Name</label>
                                    <input class="form-control" name="sub_category_name"
                                           placeholder="Please Enter Sub Category Name"/>
                                </div>
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($list_category as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default">{{$SUBMIT_BUTTON}}</button>
                                <button type="reset" class="btn btn-default">{{$CANCEL_BUTTON}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection