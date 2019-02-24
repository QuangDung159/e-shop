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
                        <h1 class="page-header">Gallery
                            <small>Create</small>
                            <small style="float: right">
                                <a role="button" href="admin/gallery/list">Back To List</a>
                            </small>
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                            <list-image-gallery-comp :list_image="{{json_encode($list_image)}}"
                                                     :list_product="{{$list_product}}"
                                                     image_path="{{$IMAGE_PATH}}"
                                                     submit_button="{{$SUBMIT_BUTTON}}"
                                                     cancel_button="{{$CANCEL_BUTTON}}"></list-image-gallery-comp>
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
        }

        // function getProductID() {
        //     console.log($("#product_name").val());
        //     let product_id = $("#product_name").val();
        //     $("#list_image_gallery_comp").attr("product_id", product_id);
        // }

        // trigger readPath function by onchange event
        $('#thumbnail').change(function () {
                readPath(this)
            }
        );
    </script>
@endsection