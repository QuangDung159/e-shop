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
                        <h1 class="page-header">Image
                            <small>Update</small>
                            <small style="float: right">
                                <a role="button" href="admin/image/list">Back To List</a>
                            </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                            <form action="admin/image/update/{{$image->id}}" method="POST"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                @if(session("invalid_type"))
                                    <div class="alert alert-danger">
                                        {{session("invalid_type")}}
                                    </div>
                                @endif
                                <div class="form-group" name="thumbnail">
                                    {{-- thêm thuộc tính enctype="multipart/form-data" ở <form> --}}
                                    <label>Preview</label>
                                    <input
                                            name="thumbnail"
                                            type="file" class="form-control"
                                            id="thumbnail">
                                </div>
                                <img id="preview_upload_img" class="preview-img"
                                     width="400px" src="{{$IMAGE_PATH}}/{{$image->path}}">
                                <hr>
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
        {{-- get path of file that you want to upload --}}
        function readPath(input) {
            // get file path
            var filePath = input.value;
            // define allow ext
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert("Please upload the file have format : jpg, png, jpeg");
                input.value = '';
                return false;
            }
            // check you input have file
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                // get file fullpath
                reader.onload = function (e) {
                    // <img> id
                    $('#preview_upload_img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        };

        // trigger readPath function by onchange event
        $('#thumbnail').change(function () {
                readPath(this)
            }
        );
    </script>
@endsection