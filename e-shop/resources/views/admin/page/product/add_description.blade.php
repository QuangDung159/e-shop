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
                        <h1 class="page-header">Product Description
                            <small>Create</small>
                            <small style="float: right">
                                <a role="button" href="admin/product/list">Back To List</a>
                            </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="row">
                        <div class="col-lg-10 col-sm-10 col-xs-10 col-md-10">
                            <form action="admin/product/add_description/{{$product_id}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <textarea name="product_description"
                                              id="demo"
                                              class="form-control ckeditor">
                                    </textarea>
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

@section("script")
    <script>
        CKEDITOR.replace('demo', {
            height: ['700px'],
        });
    </script>
@endsection