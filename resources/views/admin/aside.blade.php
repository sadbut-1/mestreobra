<aside class="app-sidebar" id="sidebar">
    <div class="sidebar-header">
        <a class="sidebar-brand text-danger" href="{{ url('/admin/home') }}"><b>Home</b></a>
        <button type="button" class="sidebar-toggle">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <div class="sidebar-menu">
        <ul class="sidebar-nav">
            <li class="active">
                <a href="{{ url('/admin/usuario') }}">
                    <div class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="title">Usuários</div>
                </a>
            </li>
            <li class="@@menu.messaging">
                <a href="{{ url('/admin/pedido') }}">
                    <div class="icon">
                        <i class="fa fa-file" aria-hidden="true"></i>
                    </div>
                    <div class="title">Pedidos</div>
                </a>
            </li>
            <li class="dropdown ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="icon">
                        <i class="fa fa-database" aria-hidden="true"></i>
                    </div>
                    <div class="title">Cadastros</div>
                </a>
                <div class="dropdown-menu">
                    <ul>
                        <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Pedidos</li>
                        <li><a href="{{ url('/admin/tipo-servico') }}">Tipo de Serviço</a></li>
                        <li><a href="{{ url('/admin/categoria') }}">Categoria</a></li>
                        <li><a href="{{ url('/admin/servico') }}">Serviço</a></li>
                        {{--<li><a href="./uikits/card.html">Card</a></li>--}}
                        <li class="line"></li>
                        <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Prestadores</li>
                        <li><a href="{{ url('admin/prestador') }}">Empresa</a></li>
                        <!-- <li><a href="./uikits/timeline.html">Timeline</a></li> -->
                        {{--<li><a href="./uikits/chart.html">Chart</a></li>--}}
                    </ul>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="icon">
                        <i class="fa fa-file" aria-hidden="true"></i>
                    </div>
                    <div class="title">Relatórios</div>
                </a>
                <div class="dropdown-menu">
                    <ul>
                        {{--<li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Admin</li>--}}
                        <li><a href="{{ url('/admin/relatorio/prestadores') }}">Prestadores</a></li>
                        <li><a href="{{ url('/admin/relatorio/pedidos/graficos') }}">Pedidos</a></li>
                        {{--<li class="line"></li>--}}
                        {{--<li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Landing</li>--}}
                        <!-- <li><a href="./pages/landing.html">Landing</a></li> -->
                    </ul>
                </div>
            </li>
            <li class="dropdown">
                <a href="{{ url('/admin/financeiro/index') }}" class="dropdown-toggle">
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <div class="title">Financeiro</div>
                </a>
            </li>
            <li class="dropdown">
                <a href="{{ url('/admin/config') }}" class="dropdown-toggle" >
                    <div class="icon">
                        <i class="fa fa-gears" aria-hidden="true"></i>
                    </div>
                    <div class="title">Configurações</div>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-footer">
        <ul class="menu">
            <li>
                <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                </a>
            </li>
            <li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>
        </ul>
    </div>
</aside>

{{--<script type="text/ng-template" id="sidebar-dropdown.tpl.html">--}}
    {{--<div class="dropdown-background">--}}
        {{--<div class="bg"></div>--}}
    {{--</div>--}}
    {{--<div class="dropdown-container">--}}
        {{--{{list}}--}}
    {{--</div>--}}
{{--</script>--}}