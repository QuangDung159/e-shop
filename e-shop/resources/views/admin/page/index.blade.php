@extends("admin.layout.main")
@section("content")
    <!-- Page Content -->
    <user-detail-comp submit_button="{{$SUBMIT_BUTTON}}"
                      cancel_button="{{$CANCEL_BUTTON}}"
                      edit_button="{{$EDIT_BUTTON}}"></user-detail-comp>
@endsection
