@include("admin.layout.header")
<body>
<div id="app">
    @include("admin.layout.nav")
    @yield("content")
</div>
<!-- /#wrapper -->
@include("admin.layout.footer")
@yield("script")
</body>
</html>