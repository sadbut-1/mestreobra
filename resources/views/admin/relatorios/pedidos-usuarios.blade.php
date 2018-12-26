@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('admin/relatorio/pedidos/graficos') }}"><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp; Gráficos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <a href="{{ url('admin/relatorio/pedidos/usuarios') }}"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Clientes</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Celular</th>
                                <th>Num. Pedidos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->nome }}</td>
                                    <td>{{ $pedido->email }}</td>
                                    <td>{{ $pedido->fone }}</td>
                                    <td>{{ $pedido->celular }}</td>
                                    <td>{{ $pedido->total_pedidos }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection