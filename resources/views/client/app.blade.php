@include('layout.head')
<body>
<div class="app app-blue-sky">
    @include('client.aside')

    <div class="app-container">
        @include('client.nav')

        @yield('content')

        @include('layout.footer')
    </div>
</div>
@include('layout.scripts')
</body>
</html>
