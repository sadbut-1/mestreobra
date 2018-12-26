<nav class="navbar navbar-default" id="navbar">
    <div class="container-fluid">
        <div class="navbar-collapse collapse in">
            <ul class="nav navbar-nav navbar-mobile">
                <li>
                    <button type="button" class="sidebar-toggle">
                        <i class="fa fa-bars"></i>
                    </button>
                </li>
                <li class="logo">
                    <a class="navbar-brand text-danger" href="#"><b>Empresas</b></a>
                </li>
                <li>
                    <button type="button" class="navbar-toggle">
                        <img class="profile-img" src="{{ asset('/assets/images/profile.png') }}">
                    </button>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li class="navbar-title"><a href="http://www.mestreobra.com.br">MestreObra</a></li>
                <li class="navbar-search hidden-sm">
                    <input id="search" type="text" placeholder="Buscar..">
                    <button class="btn-search"><i class="fa fa-search"></i></button>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(isset(Auth::user()->name))
                    <li class="dropdown profile">
                        <a href="/html/pages/profile.html" class="dropdown-toggle" data-toggle="dropdown">
                            <img class="profile-img" src="{{ asset('/assets/images/profile.png') }}">
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                <div class="title" style="margin-left: -100px;">Sair
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </a>
                        </a>
                        <div class="dropdown-menu">
                            <div class="profile-info">
                                <h4 class="username">{{ Auth::user()->name }}</h4>
                            </div>
                            <ul class="action">
                                <li>
                                    <a href="#">
                                        Perfil
                                    </a>
                                </li>
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<span class="badge badge-danger pull-right">5</span>--}}
                                        {{--My Inbox--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--Setting--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else
                    <li style="margin-right: 10px; font-size: 0.8em; color: #8d9293">ÁREA DO PRESTADOR</li>
                    <li style="margin-right: 20px">
                        <a href="/login" class="btn btn-sm btn-default">Entrar</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>