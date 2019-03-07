<!DOCTYPE html>
<html lang="en">
@include(".client.layout.header")
<body>

<div class="super_container">

    <!-- Header -->

@include(".client.layout.page_header")

<!-- Menu -->

@include(".client.layout.menu")

<!-- Home -->

<!-- Products -->

@yield("content")

<!-- Ad -->

@include(".client.layout.ad")

<!-- Icon Boxes -->

@include(".client.layout.icon_box")

<!-- Newsletter -->

@include(".client.layout.news_letter")

<!-- Footer -->

    @include(".client.layout.page_footer")

</div>

@include(".client.layout.footer")

</body>
</html>