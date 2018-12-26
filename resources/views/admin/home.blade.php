@extends('admin.app')

@section('content')

<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <a class="card card-banner card-yellow-light" href="{{ url('/admin/prestador') }}">
            <div class="card-body">
                <i class="icon fa fa-user-plus fa-4x"></i>
                <div class="content">
                    <div class="title">Prestadores Ativos</div>
                    <div class="value">
                        <span class="sign"></span>{{ $prestador['ativo'] }}/{{ $prestador['total'] }}
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <a class="card card-banner card-green-light" href="{{ url('/admin/pedido') }}">
            <div class="card-body">
                <i class="icon fa fa-shopping-basket fa-4x"></i>
                <div class="content">
                    <div class="title">ORÇAMENTOS SOLICITADOS</div>
                    <div class="value"><span class="sign"></span>{{ $pedido }}</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <a class="card card-banner card-blue-light" href="{{ url('/admin/avaliacoes') }}">
            <div class="card-body">
                <i class="icon fa fa-thumbs-o-up fa-4x"></i>
                <div class="content">
                    <div class="title">Serviços Finalizados</div>
                    <div class="value"><span class="sign"></span>{{ $avaliacoes }}</div>
                </div>
            </div>
        </a>

    </div>

</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Lista - Novidades</div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($novidades as $n)
                            <tr>
                                <td>{{ $n->id }}</td>
                                <td>{{ $n->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $novidades->render() }}
            </div>
        </div>
    </div>
    @if(count($boletos)>0)
    <div class="col-sm-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                Boletos - Total mês {{ date('m/Y',strtotime($boletos[0]->data)) }} = R$ {{ $totalBoletos }}
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th><span class="very-small">Prestador</span></th>
                        <th><span class="very-small">Valor</span></th>
                        <th><span class="very-small">Data</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($boletos as $b)
                        <tr>
                            <td><span class="very-small">{{ $b->prestador->nome }}</span></td>
                            <td><span class="very-small">{{ $b->valor }}</span></td>
                            <td width="20px"><span class="very-small">{{ date('m/Y',strtotime($b->data)) }}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $boletos->render() }}
            </div>
        </div>
    </div>
    @endif
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Histórico de Atividades</div>

            <div class="panel-body">
                You are logged in!
            </div>
        </div>
    </div>
</div>
<div style="margin-top: 300px;"></div>
@endsection
