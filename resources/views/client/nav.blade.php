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
                    <a class="navbar-brand text-danger" href="{{ url('/') }}"><b>Home</b></a>
                </li>
                <li>
                    <button type="button" class="navbar-toggle">
                        <img class="profile-img" src="/assets/images/profile.png">
                    </button>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li class="navbar-title"><a href="{{ url('http://www.mestreobra.com.br') }}">MestreObra</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(isset(Auth::user()->name))
                        <li class="dropdown notification danger">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
                            <div class="title">Notificações</div>
                            <div class="count">0</div>
                        </a>
                    </li>
                    <li class="dropdown profile">
                        <a href="/html/pages/profile.html" class="dropdown-toggle" data-toggle="dropdown">
                            <img class="profile-img" src="/assets/images/profile.png">
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
                                    @if(isset(Auth::user()->cliente->id))
                                        <a href="{{ url('/client/perfil',Auth::user()->cliente->id) }}">
                                            Perfil
                                        </a>
                                    @endif
                                </li>
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