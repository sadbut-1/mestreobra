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
                    <a class="navbar-brand text-danger" href="#"><b>Mestre Obra</b></a>
                </li>
                <li>
                    <button type="button" class="navbar-toggle">
                        <img class="profile-img" src="{{ asset('/assets/images/profile.png') }}">
                    </button>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li class="navbar-title"><a href="http://www.mestreobra.com.br"><img class="footer-img" src="/lp/images/Logo3.png" width="100px" alt="logo" /></a></li>
                <li class="navbar-search hidden-sm">
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(isset(Auth::user()->name))
                    <li class="dropdown profile">
                        <a href="/html/pages/profile.html" class="dropdown-toggle" data-toggle="dropdown">
                            @if(isset(Auth::user()->empresa->foto) && Auth::user()->empresa->foto != '')
                                <img class="profile-img" src="{{ Storage::disk('public')->url(Auth::user()->empresa->foto) }}">
                            @else
                                <img class="profile-img" src="{{ asset('/assets/images/profile.png') }}">
                            @endif
                            @if(Auth::user()->role == 1)
                                <a href="{{ url('admin/home') }}">
                                    <div style="margin-left: -95px;" class="title">
                                        Area Administrativa
                                    </div>
                                </a>
                            @elseif(Auth::user()->role == 2)
                                    <a href="{{ url('/home') }}">
                                        <div style="margin-left: -95px;" class="title">
                                            Area Administrativa
                                        </div>
                                    </a>
                            @elseif(Auth::user()->role == 3)
                                    <a href="{{ url('client/home') }}">
                                        <div style="margin-left: -95px;" class="title">
                                            Area Administrativa
                                        </div>
                                    </a>
                            @endif

                        </a>
                        <div class="dropdown-menu">
                            <div class="profile-info">
                                <h4 class="username">{{ Auth::user()->name }}</h4>
                            </div>
                            <ul class="action">
                                <li><a href="#">Perfil</a></li>
                                <li>
                                    @if(Auth::user()->role == 1)
                                        <a href="{{ url('admin/home') }}">Página Administrativa</a>
                                    @elseif(Auth::user()->role == 2)
                                        <a href="{{ url('/home') }}">Página Administrativa</a>
                                    @elseif(Auth::user()->role == 3)
                                        <a href="{{ url('/client/home') }}">Página Administrativa</a>
                                    @endif
                                </li>
                                <li>
                                    <a href="#">Configurações</a>
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
                    <li> </li>
                    <li style="margin-right: 20px">
                        <a href="/login" style="margin-left: 10px;" class="btn btn-sm btn-default">Entrar</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>