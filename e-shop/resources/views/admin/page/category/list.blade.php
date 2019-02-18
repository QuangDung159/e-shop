@extends("admin.layout.main")
@section("content")
    <!-- Page Content -->
    <category-list-comp submit_button="{{$SUBMIT_BUTTON}}"
                        cancel_button="{{$CANCEL_BUTTON}}"
                        edit_button="{{$EDIT_BUTTON}}"
                        create_button="{{$CREATE_BUTTON}}"></category-list-comp>
@endsection