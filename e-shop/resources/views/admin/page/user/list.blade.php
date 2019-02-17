@extends("admin.layout.main")
@section("content")
    <!-- Page Content -->
    <user-list-comp create_button="{{$CREATE_BUTTON}}"
                    submit_button="{{$SUBMIT_BUTTON}}"
                    cancel_button="{{$CANCEL_BUTTON}}"></user-list-comp>
@endsection