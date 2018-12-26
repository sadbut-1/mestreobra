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
                        @if(isset(Auth::user()->empresa->foto) && Auth::user()->empresa->foto != '')
                            <img class="profile-img" src="{{ Storage::disk('public')->url(Auth::user()->empresa->foto) }}">
                        @else
                            <img class="profile-img" src="/assets/images/profile.png">
                        @endif
                    </button>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li class="navbar-title"><a href="{{ url('http://www.mestreobra.com.br') }}">MestreObra</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(isset(Auth::user()->name))
                    {{--<li class="dropdown notification">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<div class="icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>--}}
                            {{--<div class="title">New Orders</div>--}}
                            {{--<div class="count">0</div>--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-menu">--}}
                            {{--<ul>--}}
                                {{--<li class="dropdown-header">Ordering</li>--}}
                                {{--<li class="dropdown-empty">No New Ordered</li>--}}
                                {{--<li class="dropdown-footer">--}}
                                    {{--<a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown notification warning">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<div class="icon"><i class="fa fa-comments" aria-hidden="true"></i></div>--}}
                            {{--<div class="title">Unread Messages</div>--}}
                            {{--<div class="count">99</div>--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-menu">--}}
                            {{--<ul>--}}
                                {{--<li class="dropdown-header">Message</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<span class="badge badge-warning pull-right">10</span>--}}
                                        {{--<div class="message">--}}
                                            {{--<img class="profile" src="https://placehold.it/100x100">--}}
                                            {{--<div class="content">--}}
                                                {{--<div class="title">"Payment Confirmation.."</div>--}}
                                                {{--<div class="description">Alan Anderson</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<span class="badge badge-warning pull-right">5</span>--}}
                                        {{--<div class="message">--}}
                                            {{--<img class="profile" src="https://placehold.it/100x100">--}}
                                            {{--<div class="content">--}}
                                                {{--<div class="title">"Hello World"</div>--}}
                                                {{--<div class="description">Marco Harmon</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<span class="badge badge-warning pull-right">2</span>--}}
                                        {{--<div class="message">--}}
                                            {{--<img class="profile" src="https://placehold.it/100x100">--}}
                                            {{--<div class="content">--}}
                                                {{--<div class="title">"Order Confirmation.."</div>--}}
                                                {{--<div class="description">Brenda Lawson</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="dropdown-footer">--}}
                                    {{--<a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    <li class="dropdown notification danger">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
                            <div class="title">Notificações</div>
                            <div class="count">0</div>
                        </a>
                        {{--<div class="dropdown-menu">--}}
                            {{--<ul>--}}
                                {{--<li class="dropdown-header">Notification</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<span class="badge badge-danger pull-right">8</span>--}}
                                        {{--<div class="message">--}}
                                            {{--<div class="content">--}}
                                                {{--<div class="title">New Order</div>--}}
                                                {{--<div class="description">$400 total</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<span class="badge badge-danger pull-right">14</span>--}}
                                        {{--Inbox--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<span class="badge badge-danger pull-right">5</span>--}}
                                        {{--Issues Report--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="dropdown-footer">--}}
                                    {{--<a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    </li>
                    <li class="dropdown profile">
                        <a href="/html/pages/profile.html" class="dropdown-toggle" data-toggle="dropdown">
                            @if(isset(Auth::user()->empresa->foto) && Auth::user()->empresa->foto != '')
                                <img class="profile-img" src="{{ Storage::disk('public')->url(Auth::user()->empresa->foto) }}">
                            @else
                                <img class="profile-img" src="/assets/images/profile.png">
                            @endif
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
                                    <a href="{{ url('/prestador/perfil') }}">
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