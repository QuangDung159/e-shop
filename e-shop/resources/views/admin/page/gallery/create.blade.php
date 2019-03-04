@extends("admin.layout.main")
@section("content")
    <div class="user-detail-comp">
        <div id="page-wrapper">
            <div class="container-fluid">
                <gallery-list-comp :list_image="{{json_encode($list_image)}}"
                                   :list_product="{{json_encode($list_product)}}"
                                   image_path="{{$IMAGE_PATH}}"
                                   submit_button="{{$SUBMIT_BUTTON}}"
                                   cancel_button="{{$CANCEL_BUTTON}}"></gallery-list-comp>
            </div>
        </div>
    </div>
@endsection