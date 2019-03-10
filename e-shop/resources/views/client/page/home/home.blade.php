@extends(".client.layout.main")
@section("content")

    {{-- slider --}}
    @include(".client.layout.slider")
    {{-- End slider --}}

    <list-product-home-comp directory_client_asset="{{$DIRECTORY_CLIENT_ASSET}}"></list-product-home-comp>
@endsection