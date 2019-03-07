<!DOCTYPE html>
<html lang="en">
@include(".client.layout.header")
<body>

<div class="super_container" id="app">

    <!-- Header -->

@include(".client.layout.page_header")

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
<script src="/js/app.js"></script>
@include(".client.layout.footer")


</body>
</html>