<!DOCTYPE html>
<html lang="en">
@include('layout.head')
<body>
<div class="app app-blue-sky">
    @include('admin.aside')

    <div class="app-container">
        @include('admin.nav')

        @yield('content')

        @include('layout.footer')
    </div>
</div>
@include('layout.scripts')
</body>
</html>


{{--<div id="app">--}}
    {{--@include('admin.nav')--}}

    {{--@yield('content')--}}
{{--</div>--}}

{{--<!-- Scripts -->--}}
{{--<script src="/js/app.js"></script>--}}