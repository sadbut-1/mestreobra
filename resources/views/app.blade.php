@include('layout.head')

<body>
    <div class="app app-blue-sky">
        {{--@include('layout.aside')--}}

        <div class="app-container no-padding">
            @include('layout.nav')

            <div class="btn-floating" id="help-actions">
                <div class="btn-bg"></div>
                <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
                    <i class="icon fa fa-bars"></i>
                    <span class="help-text">Shortcut</span>
                </button>
                <div class="toggle-content">
                    <ul class="actions">
                        <li><a href="{{ url('http://www.mestreobra.com.br') }}">Início</a></li>
                        <li><a href="{{ url('http://www.mestreobra.com.br/duvidas') }}">Dúvidas</a></li>
                        <li><a href="http://blog.mestreobra.com.br" target="_blank">Blog</a></li>
                        <li><a href="{{ url('http://www.mestreobra.com.br/sobre') }}">Sobre o Mestre Obra</a></li>
                    </ul>
                </div>
            </div>

            @yield('content')

            @include('layout.footer')
        </div>
    </div>
    @include('layout.scripts')
</body>
</html>

