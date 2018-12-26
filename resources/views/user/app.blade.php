@include('layout.head')
<body>
<div class="app app-blue-sky">
    @include('user.aside')

    <div class="app-container">
        @include('user.nav')

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